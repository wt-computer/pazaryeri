<?php $__env->startSection('title'); ?>
    Güncelleme Servisi
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-body">
        <div class="row">
            <label>Proje Kodu: <label class="col-form-label" id="proje-kodu"></label></label>


            <label>Proje Versiyon: v<label class="col-form-label" id="proje-versiyon"></label></label>


            <button type="button" id="btn-check" class="btn btn-outline-info" >Güncellemeleri Kontrol Et</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {

            let _token   = $('meta[name="csrf-token"]').attr('content');
            var btnupdatecheck = document.getElementById('btn-check');

            const proje_kodu = document.getElementById('proje-kodu')
            const proje_versiyon = document.getElementById('proje-versiyon')
            $.ajax({
                url: "/api/versiyon",
                type: "POST",
                data: {
                    _token: _token, _versiyon:'_versiyon'
                },
                success: function (response) {
                    proje_kodu.innerText = response.proje_kodu.projekodu;
                    proje_versiyon.innerText = response.versiyon_no.proje_versiyon
                }
            });

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\pazaryeri\pazaryeri\resources\views/update.blade.php ENDPATH**/ ?>