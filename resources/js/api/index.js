import axios from 'axios';


var urlIn = window.location.href
var arr = urlIn.split("/");
var currentUrl = arr[0] + "//" + arr[2] + "/api"

console.log("la url es:");
console.log(currentUrl);

let instance = axios.create({
    baseURL: currentUrl,
    //send a pseudo params for the browser doesnt take past cache when back
    // params: {
    //     pseudoParam: new Date().getTime()
    //   }

});

instance.defaults.headers.common['Access-Control-Allow-Headers'] = 'X-CSRF-Token';

export default instance;