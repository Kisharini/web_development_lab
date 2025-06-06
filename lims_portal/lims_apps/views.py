from django.shortcuts import render, redirect
import pyrebase

config = {
    "apiKey": "AIzaSyCoXmHQwKaHbS5XXGdrFUV388qa71riK8Y",
    "authDomain": "librarymanagementsystem-191d1.firebaseapp.com",
    "databaseURL": "https://librarymanagementsystem-191d1-default-rtdb.asia-southeast1.firebasedatabase.app",
    "projectId": "librarymanagementsystem-191d1",
    "storageBucket": "librarymanagementsystem-191d1.appspot.com",
    "messagingSenderId": "1081319725110",
    "appId": "1:1081319725110:web:89242d41fe0d560f25a097"
}

firebase = pyrebase.initialize_app(config)
db = firebase.database()

# Book Form
def book_form(request, book_key=None):
    book = {}
    if book_key:
        book = db.child("Library").child(book_key).get().val()

    if request.method == "POST":
        book_data = {
            "Id": request.POST["Id"],
            "Title": request.POST["Title"],
            "Author_name": request.POST["Author_name"],
            "Genre": request.POST["Genre"]
        }

        if book_key:
            db.child("Library").child(book_key).set(book_data)
        else:
            db.child("Library").push(book_data)

        return redirect("book_list")

    genres = ["Fiction", "Nonfiction", "Sci-Fi", "Biography"]
    return render(request, "library/book_form.html", {
        "book": book,
        "book_key": book_key,
        "genres": genres
    })

# Book List
def book_list(request):
    books_snapshot = db.child("Library").get()
    books = {}

    if books_snapshot.each():
        for item in books_snapshot.each():
            books[item.key()] = item.val()

    return render(request, "library/book_list.html", {"books": books})

# Delete Book
def delete_book(request, book_key):
    db.child("Library").child(book_key).remove()
    return redirect("book_list")

# Edit Book
def edit_book(request, book_key):
    if request.method == "POST":
        updated_data = {
            "Id": request.POST["Id"],
            "Title": request.POST["Title"],
            "Author_name": request.POST["Author_name"],
            "Genre": request.POST["Genre"]
        }
        db.child("Library").child(book_key).set(updated_data)
        return redirect("book_list")

    book = db.child("Library").child(book_key).get().val()
    genres = ["Fiction", "Nonfiction", "Sci-Fi", "Biography"]
    return render(request, "library/book_form.html", {
        "book": book,
        "book_key": book_key,
        "genres": genres
    })
