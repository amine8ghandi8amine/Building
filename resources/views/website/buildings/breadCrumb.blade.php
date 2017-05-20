@if( isset( $breadCrumb ) && !empty( $breadCrumb ) )
<ol class="breadcrumb">
	<h3 class="text-center"> تفاصيل البحث </h3>
	@foreach( $breadCrumb as $bCKey => $bC )
	<li>{!! $bCKey .'&nbsp;&nbsp;&nbsp;=>&nbsp;&nbsp;&nbsp;&nbsp;<span class="underline">'. $bC  .'</span>' !!}</li>
	@endforeach
</ol>
@endif