import{search} from'./export_search.js';
const mysearchp = document.querySelector("#mysearch");
const ull_add_lip = document.querySelector("#showlist");
const myurlp = "/myurl";
const searcharch = new search(myurlp,mysearchp,ull_add_lip);
searcharch.InputSearch();