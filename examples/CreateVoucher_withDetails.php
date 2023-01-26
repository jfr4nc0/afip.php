<?php
include '../src/Afip.php'; 

$date = new DateTime($fecha_hoy);
$date->add(new DateInterval('P4D'));
$fecha_emision = $date->format("Y-m-d");

$data = array(
    'codigoTipoComprobante'    => 1,
    'numeroPuntoVenta'         => 3,
    'numeroComprobante'	       => 1,
    'fechaEmision'         	   => $fecha_emision,
    'codigoTipoDocumento'      => 80,
    'numeroDocumento'          => 20111111112,
    'importeGravado'           => 100.00,
    'importeNoGravado'         => 0.00,
    'importeExento'            => 0.00,
    'importeSubtotal'          => 100.00,
    'importeOtrosTributos'     => 1.00,
    'importeTotal'             => 122.00,
    'codigoMoneda'             => 'PES',
    'cotizacionMoneda'         => 1,
    'observaciones'            => 'Observaciones',
    'codigoConcepto'           => 1,
//     'fechaServicioDesde'       => ,
//     'fechaServicioHasta'       => ,
//     'fechaVencimientoPago'     => ,
//     'fechaHoraGen'             => ,
//     'ComprobantesAsociados'    => array(
    //         array(
    //             'codigoTipoComprobante'     =>  $cod_tipo_comp,
    //             'numeroPuntoVenta'          =>  $nro_pto_venta,
    //             'numeroComprobante'         =>  $nro_comp,
    //             'cuit'                      =>  $cuit,
    //             'fechaEmision'              =>  $fecha_hoy,
    //         )
//     ),
        'arrayOtrosTributos'    => array(
            array(
                'codigo'    =>  99,
                'descripcion'   =>  'Otro Tributo',
                'baseImponible' =>  100.00,
                'importe'   =>  1.00
            )
        ),
        'arrayItems'    => array(
            array(
                'unidadesMtx'  => 123456,
                'codigoMtx'       => 012341234,
                'codigo'          => 'P0001',
                'descripcion'  => 'Descripcion del producto',
                'cantidad'     => 1.00,
                'codigoUnidadMedida' => 7,
                'precioUnitario' => 100.00,
                'importeBonificacion'   => 0.00,
                'codigoCondicionIVA'       => 5,
                'importeIVA'   => 21.00,
                'importeItem'  => 121.00
            )
        ),
        'arraySubtotalesIVA' => array(
            array(
                'codigo'       => 5,
                'importe'      => 21.00,
            )
        ),
        'arrayActividades'  =>  array(
            array(
                'codigo'    =>  120010
            )
        )
    );

$afip = new Afip(array('CUIT' => 20111111112));

$afip->ElectronicBilling_Details->CreateVoucher($data);

?>