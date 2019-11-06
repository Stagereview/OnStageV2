function imgHandler(input) {
    input = input.target
    console.log(input)
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById("companyLogoPlaceholder").src = e.target.result;
        }
        
        reader.readAsDataURL(input.files[0]);
      }
}
document.getElementById("logo").addEventListener("change", imgHandler);
