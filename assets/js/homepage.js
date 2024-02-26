var timeNow;

function startTime() {
    var asiaTime = new Date().toLocaleString("en-US", {
        timeZone: "Asia/Makassar"
    });
    var today = new Date(asiaTime);
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    //console.log(h + ":" + m + ":" + s)
    document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
    timeNow = today
};

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }; // add zero in front of numbers < 10
    return i;
}

$(document).ready(function () {
    var time8 = new Date(),
        time16 = new Date();
    time8.setHours(8);
    time16.setHours(16);
    var attr_kendala


    startTime();
    $('[data-toggle="tooltip"]').tooltip()
    $.ajax({
        type: "GET",
        url: "v2/api/witel",
        dataType: "JSON",
        success: function (response) {
            $("#select-wilayah").selectize({
                valueField: 'witel',
                labelField: 'witel',
                searchField: 'witel',
                create: false,
                options: response.data,
                render: {
                    option: function (item, escape) {
                        return '<div>' +
                            '<span>' + item.witel + '</span>' +
                            '</div>'
                    },
                    item: function (item, escape) {
                        return '<div>' +
                            '<span>' + item.witel + '</span>' +
                            '</div>'
                    }
                }
            })
        }
    });

    $('.vp-widget').click(function (e) {
        e.preventDefault();
        $('.vp-widget').css('filter', 'none');
        $(this).css('filter', 'grayscale(95%)');
        attr_kendala = $(this).attr('attr_kendala');
        $("#no_hub").empty();
        $("#button_hub").empty();
        $('#configform')[0].reset();
        $(".hmm").hide();
        $(".hmm2").hide();
        $(".hmm3").hide();


        if (attr_kendala == "pasang-baru") {
            $("#no_hub").append(
                '<div class="form-group">' +
                '<label for="no_hp" class="vp-text">Nomor Handphone / Telepon Rumah</label>' +
                '<input type="hidden" class="form-control" value="1" id="data_input" name="data_input"><input type="text" class="form-control" name="no_hp" id="no_hp" value="" required="true" onkeypress="return event.charCode >= 48 && event.charCode <= 57">' +
                '</div>'
            );
        }else if (attr_kendala == "informasi") {
            $("#no_hub").append(
                '<div class="form-group">' +
                '<label for="no_hp" class="vp-text">Nomor Handphone / Telepon Rumah</label>' +
                '<input type="hidden" class="form-control" value="3" id="data_input" name="data_input"><input type="text" class="form-control" name="no_hp" id="no_hp" value="" required="true" onkeypress="return event.charCode >= 48 && event.charCode <= 57">' +
                '</div>'
            );
        }else if (attr_kendala == "gangguan") {
            $("#no_hub").append(
                '<div class="form-group">' +
                '<label for="no_indihome" class="vp-text">Nomor Handphone / Telepon Rumah</label>' +
                '<input type="hidden" class="form-control" value="2" id="data_input" name="data_input"><input type="text" class="form-control" name="no_indihome" id="no_indihome" value="" required="true" onkeypress="return event.charCode >= 48 && event.charCode <= 57">' +
                '</div>'
            );
        } else {
            $("#no_hub").empty();
        }

        if (attr_kendala == "pasang-baru") {
            $("#button_hub").append(
                '<br>' +
                '' +
                '<button type="submit" class="btn-primary btn-sm vp-button-besar" id="add_dataa">Proses Registrasi Prioritas</button>' +
                ''
            );
        }else if (attr_kendala == "informasi") {
            $("#button_hub").append(
                '<br>' +
                '' +
                '<button type="submit" class="btn-primary btn-sm vp-button-besar" id="add_dataa">Proses Pembelian dan Pembayaran</button>' +
                ''
            );
        }else if (attr_kendala == "gangguan") {
            $("#button_hub").append(
                '<br>' +
                '' +
                '<button type="submit" class="btn-primary btn-sm vp-button-besar" id="add_dataa">Proses Layanan dan Pengaduan</button>' +
                ''
            );
        } else {
            $("#button_hub").empty();
        }


        $('.form-aduan').show();
    })

    $("#contactForm").on("submit", function (event) {
        $.LoadingOverlay("show");

        event.preventDefault();
        var namaPelanggan = $("#nama_pelanggan")
        var nomorTelepon = $("#no_hp")
        var nomorIndihome = $("#no_indihome")
        var plaza = $('#select-wilayah')

        if (attr_kendala == "pasang-baru") {
            var url = "v1/api/call/psb"
            var data = {
                "nama_pelanggan": namaPelanggan.val(),
                "nomor_telepon": nomorTelepon.val(),
                "lokasi": plaza.val()
            }
        } else if (attr_kendala == "gangguan") {
            var url = "v1/api/call/gangguan"
            var data = {
                "nama_pelanggan": namaPelanggan.val(),
                "nomor_indihome": nomorIndihome.val(),
                "lokasi": plaza.val()
            }
        } else if (attr_kendala == "informasi") {
            var url = "v1/api/call/informasi"
            var data = {
                "nama_pelanggan": namaPelanggan.val(),
                "nomor_telepon": nomorTelepon.val(),
                "lokasi": plaza.val()
            }
        } else {
            new Noty({
                type: "warning",
                text: "Keperluan harus dipilih",
                timeout: 2000
            }).show()
        }
        if (timeNow.getTime() < time8.getTime() || timeNow.getTime() > time16.getTime()) {
            window.location.href = "/out/operational"
        } else {
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: "JSON",
                success: function (response) {
                    var response = response.data[0]
                    var data = {
                        id: response.id,
                        roomName: response.room_name,
                        uid: response.uid,
                        token: response.token,
                        witel: response.place,
                        status: response.status
                    }
                    localStorage.setItem('callObject', JSON.stringify(data))
                    var csrCount = response.place.toLowerCase();
                    $.ajax({
                        type: "GET",
                        url: "v2/api/call/queue",
                        data: {
                            lokasi: response.place,
                            id: response.id,
                            status: response.status
                        },
                        success: function (response) {
                            var waitingQue = JSON.parse(response)
                            $.ajax({
                                type: "GET",
                                url: "v2/api/csr/active",
                                data: {
                                    witel: csrCount
                                },
                                success: function (response) {
                                    $.LoadingOverlay("hide")
                                    localStorage.setItem('csrCount', response);
                                    var count = JSON.parse(localStorage.getItem('csrCount'))
                                    if (count.data > 0) {
                                        if (waitingQue.data == 0) {
                                            window.location.href = "/video/ready"
                                        } else {
                                            window.location.href = "/video/waiting"
                                        }
                                    } else {
                                        window.location.href = "/video/waiting"
                                    }
                                },
                                error: function (response) {
                                    $.LoadingOverlay("hide")

                                }
                            });

                        },
                        error: function (response) {

                        }
                    });
                },
                error: function (jqXhr, textStatus, errorThrown) {
                    $.LoadingOverlay("hide")
                    var response = jqXhr.responseJSON

                    if (response.status == "entity error") {
                        if (response.message.nama_pelanggan != null) {
                            var text = response.message.nama_pelanggan

                        } else if (response.message.nomor_telepon != null) {
                            var text = response.message.nomor_telepon
                        } else if (response.message.nomor_indihome != null) {
                            var text = response.message.nomor_indihome
                        }
                        new Noty({
                            type: "warning",
                            text: text,
                            timeout: 2000
                        }).show()
                    }

                    // Response for credential
                    if (response.status == "error") {
                        new Noty({
                            type: "error",
                            text: response.message,
                            timeout: 2000
                        }).show()
                    }
                }
            });
        }

    });
})