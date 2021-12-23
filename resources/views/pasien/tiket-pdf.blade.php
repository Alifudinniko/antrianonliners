
<a target="_blank">

    <h1 align="center">AntrianOnlineRS</h1>
    <h5 align="center"> Alhamdulilah Jadi</h5>
    <h4 align="center">===============</h4>



        @forelse($nomer as $key=>$ngantri)



        <h2 align="center">{{$ngantri->namepoli->name}}</h2>

        <h2 align="center">no </h2>

         <h1 align="center"> {{$ngantri->no}} </h1>


         <h5 align="center">===============</h5>
         <h5 align="center"> Sesi : {{$ngantri->sesi_id}}
         <h5 align="center"> Id antrian : {{$ngantri->id}}
         <h5 align="center"> tanggal antri : {{$ngantri->date}}


        @empty

        @endforelse



