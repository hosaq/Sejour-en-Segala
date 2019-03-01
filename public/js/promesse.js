const getUsers =async function(){
    let response = await fetch('https://jsonplaceholder.typicode.com/users');
    let data = await response.json();
    
    return data;
};

/*getUsers().then(function(data){
document.getElementById('lulu').textContent=data[1].name;
});*/

const insertPost =async function (data) {
    let response = await fetch('https://jsonplaceholder.typicode.com/posts',{
    method:'POST',
    headers:{
        'Content-Type':'application/json'
         },
     body : JSON.stringify(data)
    });
    let responseData= await response.json();
    
    return responseData;
};
insertPost({name:'lucas',age:29}).then(function(data){
document.getElementById('lulu').textContent=data.name+', votre identifiant est : '+data.id;
});
/*var get= function(url){
    return new Promise(function(resolve,reject){
    var xhr=new window.XMLHttpRequest();
    xhr.onreadystatechange=function(){
        if(xhr.readyState===4){
            if(xhr.status===200){
                resolve(xhr.responseText);
            }else{
                reject(xhr);
            }
        }
    };
    xhr.open('GET',url,true);
    xhr.send();
    });
    
}

var getPosts= async function(){
    var response = await get('https://jsonplaceholder.typicode.com/users');
    var users=JSON.parse(response);
    //console.log(users[0]);
    return users;
}
getPosts().then(function(data){
document.getElementById('lulu').textContent=data[1].name;
});*/