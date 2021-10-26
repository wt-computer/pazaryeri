<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Güncelleme Servisi</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="assest/toastr.css" rel="stylesheet"/>
    <script src="assest/toastr.js"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased my-5">
<div class="container">
    <div class="row">
        <button type="button" id="btn-check" class="btn btn-outline-info" >Güncellemeleri Kontrol Et</button>
    </div>
</div>

<script>
    $(document).ready(function () {

        let _token   = $('meta[name="csrf-token"]').attr('content');
        var btnupdatecheck = document.getElementById('btn-check');
        btnupdatecheck.addEventListener('click', function (event) {
            event.preventDefault();
            $.ajax({
                url: "/api/update",
                type:"POST",
                data:{
                    _token: _token,
                },
                success:function(response){
                    if(response.status === 'success') {

                        toastr.info('Yeni Güncellemeler mevcut!');
                        console.log(response.message);
                        for(var i=0; i<response.message.length; i++)
                        {
                            let updatedosyayolualt = response.message[i].proje_dosyayolualt;
                            let updateuzanti = response.message[i].proje_uzanti;
                            let updatedosyayolu = response.message[i].proje_dosyayolu;
                            let updateserver = response.message[i].proje_yolu;
                            let updateversiyon = response.message[i].proje_versiyon;
                            let updateaciklama = response.message[i].proje_aciklama;
                            let updateguncelversiyon = response.message[i].proje_guncel_versiyon;
                            let updateprojeversiyonid = response.message[i].proje_versiyon_id;

                            $.ajax({
                                url: "/api/download",
                                type:"POST",
                                data:{ _updateserver: updateserver, _updateuzanti:updateuzanti, _updatedosyayolu: updatedosyayolu, _updatedosyayolualt:updatedosyayolualt, _updateversiyon:updateversiyon, _updateaciklama:updateaciklama, _updateguncelversiyon:updateguncelversiyon, _updateprojeversiyonid:updateprojeversiyonid },
                                success:function(response){

                                    if(response.status === 'success')
                                    {
                                        toastr.success(response.message);
                                    }
                                    else
                                    {
                                        toastr.warning(response);
                                    }
                                }
                            });

                            if(i+1 === response.message.length)
                            {
                                $.ajax({
                                    url: "/api/success",
                                    type:"POST",
                                    data:{ _updatesuccess:updateversiyon },
                                    success:function(response){

                                        if(response.status === 'success')
                                        {
                                            toastr.success(response.message);
                                        }
                                        else
                                        {
                                            toastr.warning(response.message);
                                        }
                                    }
                                });
                            }
                        }

                    }
                    else if(response.status === 'info')
                    {
                        toastr.info(response.message);

                    }
                },
                progress:function(event)
                {
                    toastr.info('error', event);
                    console.log("error" , event);
                },
                error:function(response)
                {
                    toastr.info('error', response.message);
                    console.log("error" , response);
                },

            });
        });

    });
</script>
</body>
</html>
<?php /**PATH C:\laravel\pazaryeri\pazaryeri\resources\views/index.blade.php ENDPATH**/ ?>