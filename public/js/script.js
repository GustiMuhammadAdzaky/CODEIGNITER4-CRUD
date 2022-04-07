$(function (params) {

    $('.tombolTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah data mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nrp').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    });

    $('.tampilModalUbah').on('click', function(){
        $('#formModalLabel').html('ubah data mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvcc/public/mahasiswa/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvcc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                // console.log(data);
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        });
    });
})