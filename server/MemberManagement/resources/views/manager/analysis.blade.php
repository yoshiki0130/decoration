@extends('layout/manager')
@section('title', '会員分析')
@section('cdn')
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"></script>
  <script src="https://unpkg.com/chartjs-plugin-colorschemes"></script>
@endsection

@section('script_head')
  <script src="{{ asset('js/chart/prefecture.js') }}"></script>
  <script src="{{ asset('js/chart/gender.js') }}"></script>
@endsection

@section('content')
  <div>
    <h1>会員分析</h1>
    <canvas id="prefectureChart"></canvas>
    <canvas id="genderChart"></canvas>
  </div>
@endsection

@section('script_body')
<script>
  console.log(@json($data));
  const prefectureData = @json($data['prefectures']);
  const genderData = @json($data['genders']);
  const prefectureCanvas = document.getElementById("prefectureChart");
  const genderCanvas = document.getElementById("genderChart");

  prefecturesHistogram(prefectureCanvas, prefectureData);
  genderPieChart(genderCanvas, genderData);
</script>
@endsection
