
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="<?php echo $str_language; ?>" xml:lang="<?php echo $str_language; ?>">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>MAMP PRO</title>
    <style type="text/css">
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: .9em;
        color: #000000;
        background-color: #FFFFFF;
        margin: 0;
        padding: 10px 20px 20px 20px;
    }

    samp {
        font-size: 1.3em;
    }

    a {
        color: #000000;
        background-color: #FFFFFF;
    }

    sup a {
        text-decoration: none;
    }

    hr {
        margin-left: 90px;
        height: 1px;
        color: #000000;
        background-color: #000000;
        border: none;
    }

    #logo {
        margin-bottom: 10px;
        margin-left: 28px;
    }

    .text {
        width: 80%;
        margin-left: 90px;
        line-height: 140%;
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.9/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div id="vueApp">

        <input type="file" name="file" ref="image">
        <button type="submit" v-on:click="uploadFile">Upload</button>

    </div>
    <script type="text/javascript">

        new Vue({
            el: '#vueApp',
            methods: {

              uploadFile: function() {
                var fromData = new FormData();
                fromData.append('image',this.$refs.image.files[0]);

                var config = {
                    onUploadProgress: function(progressEvent) {
                      var percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                      console.log(percentCompleted);
                  }
              };

              axios.post('http://api.dev/', fromData, config)
              .then(function (res) {
                 console.log(res)
             })
              .catch(function (err) {
               console.log(err.messag)
           });


          }
      }
  });
</script>
</body>
</html>