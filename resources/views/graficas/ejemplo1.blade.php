@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Graficas</h2>
    <livewire:livewire-column-chart :column-chart-model="$columnChartModel"/>

</div>
@endsection
