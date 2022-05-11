<form>
    <label for="1" style="display: block; margin-bottom:20px">
        <input type="checkbox" name="" value="sort_by=price<1000" id="1">
        check box 1
    </label>
    <label for="2" style="display: block; margin-bottom:20px">
        <input type="checkbox" name="" value="sort_by=priceBetween1000And3000" id="2">
        check box 2
    </label>
    <label for="3" style="display: block; margin-bottom:20px">
        <input type="checkbox" name="" value="sort_by=priceBetween3000And8000" id="3">
    check box 3
    </label>
    <label for="4" style="display: block; margin-bottom:20px">
        <input type="checkbox" name="" value="sort_by=priceBetween8000And12000" id="4">
    check box 4
    </label>
    <label for="5" style="display: block; margin-bottom:20px">
        <input type="checkbox" name="" value="sort_by=price>12000" id="5">
    check box 5
    </label>

</form>
<script type="text/javascript">

var inputs = document.querySelectorAll('input')
var url = window.location.href
var length = url.length
var flag = false
inputs.forEach(function(input)
{
    input.onchange= function(e)
    {
        if(url.slice(length) == "")
        {
            return url;
        }
        else
        {
            if(e.target.checked)
            {
                url = url+"&sort_by="+e.target.value
            }
            else
            {
                url= url.slice(0, url.indexOf("?sort_by="+e.target.value))
            }
        }
    }
})

    

</script>