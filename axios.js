import axios from "axios";
// change API here

var baseURL = "";

export default axios.create({
  baseURL,
});
