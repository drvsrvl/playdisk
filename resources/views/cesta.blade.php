@extends('layouts.master')
@section('title', 'cesta')
@section('contido')

<div style="width:100%;background: linear-gradient(180deg, rgb(45, 45, 45) 0%, rgb(0,0,0) 100%); padding-bottom:20px; padding-top: 30px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 24px;">
    <div class="contidolista mt-2 pt-2">
    <div class="infolista" style="justify-content:space-between; height:100px">
            <h3>Cesta</h3>
        </div>
    <hr/>
    <div class="cancionslista px-4">
        <table>
            <tr>
                <td>Produto</td><!-- comment -->
                <td>Formato</td><!-- comment -->
                <td>Cantidade</td><!-- comment -->
                <td>Prezo</td><!-- comment -->
            </tr>

            <tr>
                <td></td>
                <td></td>

            </tr>

        </table>
    </div>
</div>
<br/>

@stop