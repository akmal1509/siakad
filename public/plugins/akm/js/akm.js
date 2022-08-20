$(document).ready(function () {
    $("#jam_mulai").change(function () {
        var jamMulai = $("#jam_mulai").val();
        console.log(jamMulai);
        $.ajax({
            type: "GET",
            url: "/cekJamMulai",
            data: {
                jam: jamMulai
            },
            success: function (data) {

                // if (data.ja > 0) {
                //     // console.log(data);
                //     console.log('succsess');
                // }
                // else {
                //     console.log('failed');
                //     // console.log(data.ja);
                // }
                // var cek2 = data.cek;
                console.log(data.cek);
                if ((data.cek).includes('failed')) {
                    console.log('gagal');
                    $('#statusJamMulai').empty()
                    $('#jam_mulai').after(`<small id="statusJamMulai" class="text-danger font-italic">Jam Bentrok</small>`)
                    $("#saveJadwal").attr("disabled", "disabled");
                    $('#jam_selesai').attr("disabled", "disabled")
                }
                else {
                    console.log('bisa');
                    $('#statusJamMulai').empty()
                    $("#saveJadwal").removeAttr('disabled');
                    $("#jam_selesai").removeAttr('disabled');
                }

                // var cek3 = cek2.includes('failed')
                // console.log(cek3)
            }
        });
    })
    $("#jam_selesai").change(function () {
        var jamMulai = $("#jam_mulai").val();
        var jamSelesai = $("#jam_selesai").val();
        if (jamMulai > jamSelesai) {
            $('#statusJamSelesai').empty()
            $('#jam_selesai').after(`<small id="statusJamSelesai" class="text-danger font-italic">Jam selesai kurang dari jam mulai</small>`)
            $("#saveJadwal").attr("disabled", "disabled");
        }
        else {
            console.log(jamSelesai);
            $.ajax({
                type: "GET",
                url: "/cekJamMulai",
                data: {
                    jam: jamSelesai
                },
                success: function (data) {

                    // if (data.ja > 0) {
                    //     // console.log(data);
                    //     console.log('succsess');
                    // }
                    // else {
                    //     console.log('failed');
                    //     // console.log(data.ja);
                    // }
                    // var cek2 = data.cek;
                    console.log(data.cek);
                    if ((data.cek).includes('failed')) {
                        console.log('gagal');
                        $('#statusJamSelesai').empty()
                        $('#jam_selesai').after(`<small id="statusJamSelesai" class="text-danger font-italic">Jam Bentrok</small>`)
                        $("#saveJadwal").attr("disabled", "disabled");
                    }
                    else {
                        console.log('bisa');
                        $('#statusJamSelesai').empty()
                        $("#saveJadwal").removeAttr('disabled');
                    }

                    // var cek3 = cek2.includes('failed')
                    // console.log(cek3)
                }
            });
        }

    })
    // $('#provinsi').on('change', function () {
    //     onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
    // });
});