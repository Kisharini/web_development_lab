import firebase_admin 
from firebase_admin import credentials, db

cred = credentials.Certificate("lims_portal/lims_portal/firebase_config/serviceAccountKey.json")  
firebase_admin.initialize_app(cred, {
    "databaseURL": "https://librarymanagementsystem-191d1.firebaseio.com"
})

print("Firebase initialized:", firebase_admin._apps)
