<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <title>Example APOD call</title>
</head>
<body>
  <b>API</b>
  <pre id="reqObject"></pre>
  
  
  <img id="apod_img_id" width="250px"/>
  
  <iframe id="apod_vid_id" type="text/html" width="640" height="385" frameborder="0"></iframe>
  <p id="copyright"></p>
  
  <h3 id="apod_title"></h3>
  <p id="apod_explaination"></p>
  
  <script>
  var url = "https://api.nasa.gov/planetary/apod?api_key=XxLpx5crEACy85EOU1Nol98ZM08gxM6sommvoTKc";


$.ajax({
  url: url,
  success: function(result){
  if("copyright" in result) {
    $("#copyright").text("Image Credits: " + result.copyright);
  }
  else {
    $("#copyright").text("Image Credits: " + "Public Domain");
  }
  
  if(result.media_type == "video") {
    $("#apod_img_id").css("display", "none"); 
    $("#apod_vid_id").attr("src", result.url);
  }
  else {
    $("#apod_vid_id").css("display", "none"); 
    $("#apod_img_id").attr("src", result.url);
  }
  $("#reqObject").text(url);
  $("#returnObject").text(JSON.stringify(result, null, 4));  
  $("#apod_explaination").text(result.explanation);
  //$("#apod_title").text(result.title);
}
});
</script>
</body>
</html>