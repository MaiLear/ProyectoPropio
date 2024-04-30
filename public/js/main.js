const d = document;
let containerUser = document.querySelector(".container-menu-top-user");
let containerSelect = document.querySelector(".container-menu-top-select");


// setTimeout(() => {
//     document.querySelector(".register__message").style.display = "none";
// }, 3000);

const makeRequest = async(url,fetchOptions)=>{
    try{
        const data = await fetch(url,fetchOptions);
        const text = await data.text();
        console.log(text);
    }catch(err){
        console.log(err);
    }
    
}



// d.addEventListener('click',async(e)=>{
//     if(e.target.matches('#lateral-menu-products') || e.target.matches('#lateral-menu-products *')){
//         e.preventDefault();
//         const $link = e.target.tagName == 'A' ? e.target : e.target.firstElementChild;
//         await makeRequest('/admin/products',{
//             headers: {
//                 'Authorization': localStorage.getItem('adminToken')
//             }
//         }) 
//     }
//     else if(e.target.matches('#lateral-menu-customers') || e.target.matches('#lateral-menu-customers *')){
//         e.preventDefault();
//         $link = e.target.tagName == 'A' ? e.target : e.target.firstElementChild; 

//     }
// })

