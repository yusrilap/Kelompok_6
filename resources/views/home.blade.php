@extends('layouts.app')
@section('content')
	<div class="content-wrapper pb-5 pt-3">
		<section class="content pb-3">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-12">
								<div class="info-box bg-info-gradient">
									<span class="info-box-icon"><i class="fa fa-money"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Salary</span>
										<span class="info-box-number">{{ $salary ?? 0 }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="info-box bg-success-gradient">
									<span class="info-box-icon"><i class="fa fa-calendar"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Schedule</span>
										<span class="info-box-number">{{ $schedule ?? 0 }}</span>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="info-box bg-secondary-gradient">
									<span class="info-box-icon"><i class="fa fa-user-circle"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Staff</span>
										<span class="info-box-number">{{ $staff ?? 0 }}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
			</div>
		</section>
	</div>

@endsection
