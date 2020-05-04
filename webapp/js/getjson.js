   //I, Gregory Carroll student# 000101968 certify that this material is my original work.
   // No other person's work has been used without due acknowledgement.

window.addEventListener("load", function() { 

   let userName=$( "#greeting" ).data( "name" ); //assigns greeting message div id contents to variable userName
   let params = "&name=" + userName; 
	
	//shows orders
    let url = "getorders.php";  
        fetch(url, {
               method: 'POST',
               credentials: 'include',
               headers: { "Content-Type": "application/x-www-form-urlencoded" }, 
               body: params })
           .then(response => response.json())
           .then(success)

   //converts tickets to html 
   function userToHtml(orderitem) { //output of order object into html
       let html = "<div class='ticket'>"; 
       html += "<tr id='"+orderitem.orderID+"'><td><b>" +  orderitem.orderID + "</b></td><td><b>" + orderitem.ordertype + "</b></td><td>";
       html += orderitem.ordermessage + "<br></td><td><h4>" + orderitem.budget + "</h4><td><ul><button type='button' class='edit'>Edit</button>";
       html += "<button type='button' class='delete'>Delete</button></ul></td></td></tr>";
       html += "</div>";
       return html; //return table row of order
   }

   function success(entirelist) { //upon success function lists all the current ticket items
       let items = "";
       for (let i = 0; i < entirelist.length; i++) {
           items += userToHtml(entirelist[i]);
       }
       document.getElementById("allitems").innerHTML = items; //populates the div id "allitems" with all the ticket objects in html format from the html above
    }

   let button = document.getElementById("submit");  
   button.addEventListener("click", function() { //listens for submit button

       let userName=$( "#greeting" ).data( "name" ); //gets username
       let ordertype = $("#ordertype :selected").val(); // JQUERY gets selected value
       let ordermessage = document.getElementById("ordermessage").value; //gets ordermesage 
       let budget = document.getElementById("budget").value; //gets budget

       // construct the parameter string
       // we're using the same style as GET params
       let params = "&ordertype=" + ordertype + "&ordermessage=" + ordermessage + "&budget=" + budget + "&name=" + userName;

       // do the fetch
       fetch("additem.php", {
               method: 'POST',
               credentials: 'include',
               headers: { "Content-Type": "application/x-www-form-urlencoded" }, 
               body: params     
           })

       .then(
    function(response) {
      if (response.status !== 200) { // checks if request successfull

        return;
      }
       // Examine the text in the response
      response.json().then(function(data) { //adds a new row in table
          var rows=$('<tr id="'+data+'"><td><b>'+data+'</b></td><td><b>'+ordertype+' </b></td><td>'+ordermessage+'<br></td><td><h4>'+budget+'</h4></td><td><ul><button type="button" class="edit">Edit</button><button type="button" class="delete">Delete</button></ul></td></tr>');
        rows.hide();
   $('#allitems').append(rows);
  rows.fadeIn("slow"); //fades in new order with JQUERY
     
      });

    })

   });
  
});

 $(document).ready(function() { 

  $('.div2').hide(); //hides edit form
       $('body').on('click', '.delete', function() { //sends delete request

let orderID=$(this).closest('tr').prop('id'); //assigns orderid to variable orderID
   
            // construct the parameter string using the same style as GET params
            let params = "orderID=" + orderID;  
    
            // do the fetch
            fetch("deleteitem.php", {
                method: 'POST',
                credentials: 'include',
                headers: { "Content-Type": "application/x-www-form-urlencoded" }, // parameter format
                body: params // POST params are sent in the body     
            })
                .then(
    function(response) {
      if (response.status !== 200) { //checks if request successfull
        return;  
      }
     
      var $row = $("#"+orderID); //assign orderID to row
      $row.fadeOut(1000,function() { //fade when removing a row
          $row.remove(); //remove row
        })
    }) 
});

        var id="";
        $('body').on('click', '.edit', function() { //calls the edit function
        $('.div1').hide(); //hides the table
        $('.div2').show(); //shows edit form
        let orderID=$(this).closest('tr').prop('id'); 
        id=$(this).closest('tr').prop('id');

  // construct the parameter string using the same style as GET params
            let params = "orderID=" + orderID;  
    
            // do the fetch
            fetch("geteditdata.php", {
                method: 'POST',
                credentials: 'include',
                headers: { "Content-Type": "application/x-www-form-urlencoded" }, // parameter format
                body: params // POST params are sent in the body     
            })
                   .then(
    function(response) {
      if (response.status !== 200) { //checks if request successfull
        //alert(response.json());
        return;
      }

      // Examine the text in the response (response contains value about request)
      response.json().then(function(data) {
        
        $("#ordertype2").val(data[0]["ordertype"]); 
        $("#ordermessage2").val(data[0]["ordermessage"]);
        $("#budget2").val(data[0]["budget"]);
    
      });
    })
        });

           $('body').on('click', '#submit2', function() { //calls submit function / save edited data

	   //collect data
       let userName=$( "#greeting" ).data( "name" ); //gets username 
       let ordertype = $("#ordertype2 :selected").val(); // JQUERY gets selected value of ordertype
       let ordermessage = document.getElementById("ordermessage2").value; //gets ordermessage
       let budget = document.getElementById("budget2").value; //gets budget
       let orderID=id; //gets order id
       
	   // construct the parameter string
       // we're using the same style as GET params
       let params = "&ordertype=" + ordertype + "&ordermessage=" + ordermessage + "&budget=" + budget + "&name=" + userName+ "&id=" + orderID;

       // do the fetch (send request)
       fetch("edit_order.php", {
               method: 'POST',
               credentials: 'include',
               headers: { "Content-Type": "application/x-www-form-urlencoded" }, 
               body: params     
           })

       .then( //update edited data
    function(response) {
      if (response.status !== 200) { //checks if request successfull
        return;
      }
     
  $('.div2').hide(); //hides the edit area
  $('.div1').show(); //shows the table
     
location.reload();
    })
           });
    });