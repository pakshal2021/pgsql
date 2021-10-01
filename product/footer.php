<script>
function validate()
{  
    var name = document.myform.name.value;
    var price = document.myform.price.value;
    var status = document.myform.status.value; 
    if (name==null || name=="")
    {  
        document.getElementById("name").innerHTML=" * Name is Required";  
        return false;  
    }
    else if(!/^[a-zA-Z]/.test(name))
    {
        document.getElementById("name").innerHTML= " * Name only must have letters ";
        return false;
    }
    else if(!/^[a-zA-Z- ]*$/.test(name))
    {
        document.getElementById("name").innerHTML= " * Name only must have letters ";
        return false;
    }
    if (price==null || price=="")
    {  
        document.getElementById("price").innerHTML=" * price is Required";  
        return false;  
    } 
    else if (isNaN(price))
    {  
        document.getElementById("price").innerHTML=" * Enter Numeric value only";  
        return false;  
    }  
    else if(price >= 1000)
    {
        document.getElementById("price").innerHTML=" * Price is Not be More Than 999";  
        return false;
    }
    if (status==null || status=="")
    {  
        document.getElementById("status").innerHTML=" * Status is Required";  
        return false;  
    } 
}
function validatation()
{
    var name = document.myform.name.value;
    var email = document.myform.email.value;
    var atposition=email.indexOf("@");  
    var dotposition=email.lastIndexOf("."); 
    var password = document.myform.password.value;
    var phone_no = document.myform.phone_no.value;
    var address = document.myform.address.value;
    var address = document.myform.gender.value;
    var status = document.myform.status.value;
    if (name==null || name=="")
    {  
        document.getElementById("name").innerHTML=" * Name is Required";  
        return false;  
    }
    else if(!/^[a-zA-Z]/.test(name))
    {
        document.getElementById("name").innerHTML= " * Name only must have letters ";
        return false;
    }
    else if(!/^[a-zA-Z- ]*$/.test(name))
    {
        document.getElementById("name").innerHTML= " * Name only must have letters ";
        return false;
    }
    if (email==null || email=="")
    {  
        document.getElementById("email").innerHTML=" * Email is Required";  
        return false;  
    }
    else if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length)
    {  
        document.getElementById("email").innerHTML=" * Please enter a valid e-mail address ";  
        return false;  
    }
    if (password==null || password=="")
    {  
        document.getElementById("password").innerHTML=" * Password is Required";  
        return false;  
    } 
    else if (password.length < 8)
    {
        document.getElementById("password").innerHTML=" * Password must be at least 8 characters long.";  
        return false;
    }
    if (phone_no==null || phone_no=="")
    {  
        document.getElementById("phone_no").innerHTML=" * Phone Number is Required";  
        return false;  
    }
    else if (isNaN(phone_no))
    {  
        document.getElementById("phone_no").innerHTML=" * Enter Numeric value only";  
        return false;  
    }
    // else if (phone_no.length < 10 || phone_no.length > 10)
    // {
    //     document.getElementById("phone_no").innerHTML=" * Phone Number is Required 10 Digit .";  
    //     return false;
    // }
    if (address==null || address=="")
    {  
        document.getElementById("address").innerHTML=" * Address is Required";  
        return false;  
    }
    if (gender==null || gender=="")
    {  
        document.getElementById("gender").innerHTML=" * gender is Required";  
        return false;  
    }
    if (status==null || status=="")
    {  
        document.getElementById("status").innerHTML=" * Status is Required";  
        return false;  
    }
}
function validatation1()
{
    var email = document.myform.email.value;
    var atposition=email.indexOf("@");  
    var dotposition=email.lastIndexOf("."); 
    var password = document.myform.password.value;
    if (email==null || email=="")
    {  
        document.getElementById("email").innerHTML=" * Email is Required";  
        return false;  
    }
    else if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= email.length)
    {  
        document.getElementById("email").innerHTML=" * Please enter a valid e-mail address ";  
        return false;  
    }
    if (password==null || password=="")
    {  
        document.getElementById("password").innerHTML=" * Password is Required";  
        return false;  
    } 
    else if (password.length < 8)
    {
        document.getElementById("password").innerHTML=" * Password must be at least 8 characters long.";  
        return false;
    }
}    
</script>