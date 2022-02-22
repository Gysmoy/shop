array = [
    {
        type: "whatsapp",
        description: "940781831",
    },
    {
        type: "email",
        description: "yoninfantearce@gmail.com",
    },
];
function del(array , name) {
    array.forEach(function (val, index, arr) {
        if(array[index].type == name){
         array.splice(index, 1);  
        }
    });
    return array;
}

res = del(array,'email');
 
console.log(res);