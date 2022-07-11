@extends('main')
<button class="btn_create"><a class="link" href="{{route('accounts-index')}}">Back to the accounts list</a></button>
@section('content')

<table class="content-table">
    <thead>
        <tr>
            <th>IBAN</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>PERSONAL ID</th>
            <th>FUNDS</th>
            <th>ADD FUNDS</th>
            <th>DEDUCT FUNDS</th>
        </tr>
    </thead>
    <form method="post" action="{{route('accounts-update', $account)}}">
        <tbody>
            <tr>
                <td> {{$account->accNr}} </td>
                <td> {{$account->name}} </td>
                <td> {{$account->surname}} </td>
                <td> {{$account->personId}} </td>
                <td> {{$account->sum}} </td>
                <td><input class="input" type="text" name="addFunds" /><button class="btn_add"  type="submit">ADD</button></td>
                <td><input class="input" type="text" name="deductFunds" /><button class="btn_del"  type="submit">DEDUCT</button></td>
            </tr>
        </tbody>
@csrf
@method('put')
    </form>
</table>
@endsection