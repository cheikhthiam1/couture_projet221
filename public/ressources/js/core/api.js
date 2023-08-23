export class Api{
 static async getData(url){
  const response = await fetch(url);
  const data = await response.json();
  return data;
 }

 static async postData(url="",data={}){
 await fetch(url, {
   method: 'POST',
   headers: {
     'Content-type': 'application/json'
   },
   
   body: JSON.stringify(data)
 }); 
 }
}