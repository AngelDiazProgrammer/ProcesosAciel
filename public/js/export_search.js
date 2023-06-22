export class search{
    constructor(myurlp,mysearchp,ull_add_lip){
        this.url = myurlp;
        this.mysearch = mysearchp;
        this.ull_add_li = ull_add_lip;
        this.idli = "mylist";
    }

    InputSearch(){
        this.mysearch.addEventListener("input", (e) => {e.preventDefault();
        try{
            let token= document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            let minimo_letras = 0;
            let valor = this.mysearch.value;
            if (valor.length > minimo_letras){
                let datasearch = new FormData();
                datasearch.append("valor", valor);
                fetch(this.url,{
                    headers:{
                        "X-CSRF-TOKEN": token,
                    },
                    method:"post",
                    body:datasearch
                })
                .then((data) => data.json())
                .then((data)=>{
                    this.Showlist(data, valor);
                })
                .catch(function (error){
                    console.error("Error",error);
                });
                }else{
                    this.ull_add_li.style.display = "";
                }            
        }catch(error){
            console.log(error);
        }
    });
    }

    
}