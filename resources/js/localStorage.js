export const getData=(id_user)=>
{
    let data = localStorage.getItem(id_user)
    return JSON.parse(data)
}

export const saveData=(id_user,data)=>
{
    console.log(data);
    localStorage.setItem(id_user,JSON.stringify(data))
}

export const deleteData=(id_user)=>
{
    localStorage.removeItem(id_user)
}


