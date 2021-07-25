<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Some Random Title</title>
    <style>
        body{
            font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace !important;
            letter-spacing: -0.3px;
        }
        .invoice-wrapper{ width: 700px; margin: auto; }
        .nav-sidebar .nav-header:not(:first-of-type){ padding: 1.7rem 0rem .5rem; }
        .logo{ font-size: 50px; }
        .sidebar-collapse .brand-link .brand-image{ margin-top: -33px; }
        .content-wrapper{ margin: auto !important; }
        .billing-company-image { width: 50px; }
        .billing_name { text-transform: uppercase; }
        .billing_address { text-transform: capitalize; }
        .table{ width: 100%; border-collapse: collapse; }
        th{ text-align: left; padding: 10px; }
        td{ padding: 10px; vertical-align: top; }
        .row{ display: block; clear: both; }
        .text-right{ text-align: right; }
        .table-hover thead tr{ background: #eee; }
        .table-hover tbody tr:nth-child(even){ background: #fbf9f9; }
        address{ font-style: normal; }
    </style>
</head>
<body>
    <div class="row invoice-wrapper">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td>
                                <img src="../public/images/blessing.png" width="200px">
                            </td>
                            <td class="text-right">
                                <strong>Fecha: {{$user->start_date}}</strong><br><br>
                                <b>Sala de Máquinas Acondicionamiento/</b><br>
                                <b>Cardio Box/Aerorumba/Circuito</b><br>
                                <b>entrenamiento funcional/</b><br>
                                <b>Personal Trainer</b><br>
                                Dirección. calle 76 # 7 s bis -04 <br>
                                Alfonso López 3 <br>
                                Whatsaap: 315 493 0005
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <td>
                                <div class="">
                                    <address>
                                        <strong>Nombre:</strong><br>
                                        <strong>Cedula:</strong><br>
                                        <strong>Tel:</strong><br>
                                        <strong>Dirección:</strong>
                                    </address>
                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <address>
                                        <span class="billing_address">{{$user->name}}</span><br>
                                        <span class="billing_address">{{$user->document}}</span><br>
                                        <span class="billing_address">{{$user->phone == '' ? 'xxxxxx' : $user->phone}}</span><br>
                                        <span class="billing_address">{{$user->address == '' ? 'xxxxxx' : $user->address}}</span>
                                    </address>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <td><strong>por concepto de:</strong></td>
                                <td>
                                    <input type="checkbox" id="coding" name="interest" value="coding">
                                    <label for="coding">Entreno</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="coding" name="interest" value="coding">
                                    <label for="coding">Semana</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="coding" name="interest" value="coding">
                                    <label for="coding">Mas</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="coding"></label>
                                </td>
                                <td>
                                    <input type="checkbox" id="coding" name="interest" value="coding">
                                    <label for="coding">Trimestre</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="coding" name="interest" value="coding">
                                    <label for="coding">Semestre</label>
                                </td>
                                <td>
                                    <input type="checkbox" id="coding" name="interest" value="coding">
                                    <label for="coding">Año</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <div class="row invoice-info">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <td>
                                    <div>
                                      <h2>Precio: ${{number_format($user->price)}}</h2>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-right">
                                      <hr><br>
                                      <strong>Firma y Sello</strong>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
            </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>    
</body>
</html>
