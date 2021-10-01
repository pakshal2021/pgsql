<script>
function validate1()
{  
    var name = document.myform.cname.value;
    var status = document.myform.status.value; 
    var description = document.myform.description.value;

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
    if (status==null || status=="")
    {  
        document.getElementById("status").innerHTML=" * Status is Required";  
        return false;  
    } 
    if(description==null || description=="")
    {
        document.getElementById("description").innerHTML=" * Description is Required";
        return false;
    }
}    
</script>