<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Factura</title>
  <style>
    .img {
      width: 150px;
      height: auto;
      margin: 0px;
    }

    td,
    th {
      /* border: 1px solid #000; */
    }

    h4 {
      margin: 0;
    }

    .right {
      text-align: right;
    }

    table {
      width: 100%;
    }

  </style>
</head>
<body>
  <div style="margin: 0 16px;">
    <table>
      <tr>
        <td>
          {{-- <img alt="Babel" src="{{ asset('images/babellogo.jpeg') }}" class="img" /> --}}
          <h1 style="color: #666">Babel</h1>
        </td>
        <td class="right">
          <h4>
            Fecha de emisión:
            <span>{{ date_format($sell->created_at,'d-m-Y') }}</span>
          </h4>
        </td>
      </tr>
      <tr>
        <td class="">
          +52 773 159 8533 <br />
          babelclothes@gmail.com
        </td>
        <td class="right">
          <h4>
            Factura: BABEL-000{{ $sell->id }}
          </h4>
        </td>
      </tr>
    </table>

    <hr />
    <h1 style="text-align: center; margin-top:64px">FACTURA</h1>
    <h4 style="text-align: left; margin: 0px 0 16px 0; padding: 0px;">
      Querétaro, {{ date_format($sell->created_at,'d-m-Y') }}
    </h4>
    <table>
      <tr>
        <td>
          Comprador: {{ $user->name }} {{ $user->ap }} {{ $user->am }}
        </td>
        <td class="right">
          Número de compra: #{{ $sell->id }}
        </td>
      </tr>
      <tr>
        <td>
          Correo: {{ $user->email }}
        </td>
        <td class="right">
          RFC: {{ $user->rfc }}
        </td>
      </tr>
    </table>

    <hr />
    <table style="margin-top: 64px;">
      <thead>
        <tr>
          <th style="text-align: center;">
            <h4>Cantidad</h4>
          </th>
          <th style="text-align: center;">
            <h4>Concepto</h4>
          </th>
          <th style="text-align: right;">
            <h4>Precio unitario</h4>
          </th>
          <th style="text-align: right;">
            <h4>Total</h4>
          </th>
        </tr>
      </thead>
      <tbody>
        @php
        $total = 0;
        @endphp
        @foreach($details as $detail)
        @php $product = DB::select('select * from products where id = ?', [$detail->product_id])[0];
        // dd($product);
        $precio = $product->precio_prod - ($product->precio_prod * $detail->descuento);
        $subtotal = $precio * $detail->cantidad; $total += $subtotal;
        //dd($precio);
        @endphp
        <tr>
          <td style="text-align: center;">{{ $detail->cantidad }}</td>
          <td style="text-align: center;">
            {{ $product->nameProduct }} | Tee-shirt
          </td>
          <td style="text-align: right;">$ {{ $precio }}</td>
          <td style="text-align: right;">$ {{ $subtotal }}</td>
        </tr>
        @endforeach
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td class="text-right">&nbsp;</td>
          <td class="text-right">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: right;">Total MXN.</td>
          <td style="text-align: right;">$ {{ $total }}</td>
        </tr>
      </tbody>
    </table>

    <h6 style="margin-top: 128px;">
      "LA ALTERACI&Oacute;N, FALSIFICACI&Oacute;N O COMERCIALIZACI&Oacute;N
      ILEGAL DE ESTE DOCUMENTO ESTA PENADO POR LA LEY"
    </h6>
  </div>
</body>
</html>
