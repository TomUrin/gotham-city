@extends('main')
@section('title')
Bank-lara
@endsection

<button class="btn_create"><a class="link" href="{{route('accounts-create')}}">Click here to add new account</a></button>
@section('content')

<table class="content-table">
    <thead>
        <tr>
            <th>IBAN</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>PERSONAL ID</th>
            <th>FUNDS</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
@foreach($accounts as $account)
    <tbody>
        <tr>
            <td> {{$account->accNr}} </td>
            <td> {{$account->name}} </td>
            <td> {{$account->surname}} </td>
            <td> {{$account->personId}} </td>
            <td> {{$account->sum}} </td>
            <td><button class="btn_edit"><a href="{{route('accounts-edit', $account)}}">EDIT</a></button>
                <form method="POST" action="{{route('accounts-delete', $account)}}">
                    <button class="btn_del"  type="submit">DELETE</button></td>
        </tr>
    </tbody>
   @csrf
   @method('delete')
                </form>
@endforeach
</table>
@endsection