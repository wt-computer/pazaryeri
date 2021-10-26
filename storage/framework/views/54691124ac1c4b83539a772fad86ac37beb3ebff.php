<?php $__env->startSection('title'); ?>
    Siparişler
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {

            let _token   = $('meta[name="csrf-token"]').attr('content');
            const btnsalecheck = document.getElementById('btn-sale-check');

            btnsalecheck.addEventListener('click', function () {
                $.ajax({
                    url: "/api/orders",
                    type: "POST",
                    data: {
                        _token: _token,
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            })




        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="row">
            <button id="btn-sale-check">Sipariş Kontrol Et</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('themes.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\pazaryeri\pazaryeri\resources\views//orders.blade.php ENDPATH**/ ?>