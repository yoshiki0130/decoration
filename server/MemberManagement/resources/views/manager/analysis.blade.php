@extends('layout/manager')
@section('cdn')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
  <script src="https://unpkg.com/chartjs-plugin-colorschemes"></script>
@endsection

@section('script_head')
  <script src="{{ asset('js/chart/prefecture.js') }}"></script>
@endsection

@section('content')
  <div>
    <h1>会員分析</h1>
    <canvas id="prefectureChart"></canvas>
  </div>
@endsection

@section('script_body')
<script>
  const prefectureData = @json($data['prefectures']);
  const prefectureCanvas = document.getElementById("prefectureChart");

  usersEachPrefecturesChart(prefectureCanvas, prefectureData);
</script>
@endsection
