todoMain();
function todoMain(){
let inputyElem,
dateInput,
timeInput
function getElement(){
    dateInput=document.getElementById("dateInput");
    timeInput=document.getElementById("timeInput");
    
    function addEntry(Event){
        let dateValue=dateInput.value;
        dateInput.value="";

        let timeValue=timeInput.value;
        timeInput.value="";
        let obj= {
            date:dateValue,
            time:timeValue,
             done:false,

        };
        
     function rendowRow({todo:date,time,done}){
        //date cell
        let dateElem=document.createElement("td");
        let dateObj=new date(date);
       
      let formattedDate=dateObj.tolocaLString("en-GB",
      
      {
        month:"long",
        day:"numeric",
        year:"numeric",
      });
      console.log(formattedDate);
        dateElem.innerText=date;
    trElem.appendChild(dateElem);
    //timecell
    let tdElem2=document.createElement("td");
    timeElem.innerText=time;
    trElem.appendChild(timeElem);
     }
    
    }
}
}

