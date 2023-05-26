<?php

    $url 	= "https://corona.elpida.my.id/api/";
    $get	= file_get_contents($url);
    $parse	= json_decode($get);

    $last_update = $parse->date_string;
    $active		 = $parse->active;
    $total		 = $parse->total;
    $sembuh		 = $parse->sembuh;
    $meninggal	 = $parse->meninggal;

    $persen_active = number_format($parse->persen_active, 2);
    $persen_sembuh = number_format($parse->persen_sembuh, 2);
    $persen_meninggal = number_format($parse->persen_meninggal, 2);


?>
<div class="section light-bg" id="info">
        <div class="container">
            <div class="section-title">
                <small><CENTER>SEPUTAR COVID-19</CENTER></small>
                <h3>Update data pada tanggal <?php echo $last_update; ?> di Indonesia </h3>
            </div>

            	<div class="row number-counters">
						
						<!-- first count item -->
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms">
							<div class="counters-item">
								<i class="ti-plus fa-3x"></i>
								<strong><?php echo $active; ?></strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p class="lead">Pasien Positif (<?php echo $persen_active; ?>%)</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
							<div class="counters-item">
								<i class="ti-heart fa-3x"></i>
								<strong><?php echo $sembuh; ?></strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p class="lead">Pasien Sembuh (<?php echo $persen_sembuh; ?>%)</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
							<div class="counters-item">
								<i class="ti-minus fa-3x"></i>
								<strong><?php echo $meninggal; ?></strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p class="lead">Pasien Meninggal (<?php echo $persen_meninggal; ?>%)</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="900ms">
							<div class="counters-item">
								<i class="ti-user fa-3x"></i>
								<strong><?php echo $total; ?></strong>
								<!-- Set Your Number here. i,e. data-to="56" -->
								<p class="lead">Total</p>
							</div>
						</div>
						<!-- end first count item -->
				
					</div>
            <div class="section light-bg" id="info">
        	<div class="container">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#communication">Pengenalan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#schedule">Pencegahan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages">Pengobatan</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="communication">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/graphic.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div>

                            <h2>Communicate with ease</h2>
                            <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills. </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                                congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent quis facilisis elit. Sed condimentum neque quis ex porttitor,
                            </p>
                            <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros. Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu faucibus justo sollicitudin. Mauris consectetur, tortor
                                sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin aliquet vulputate aliquam.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="schedule">
                    <div class="d-flex flex-column flex-lg-row">
                        <div>
                            <h2>Scheduling when you want</h2>
                            <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills. </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                                congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent quis facilisis elit. Sed condimentum neque quis ex porttitor,
                            </p>
                            <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros. Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu faucibus justo sollicitudin. Mauris consectetur, tortor
                                sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin aliquet vulputate aliquam.
                            </p>
                        </div>
                        <img src="images/graphic.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                    </div>
                </div>
                <div class="tab-pane fade" id="messages">
                    <div class="d-flex flex-column flex-lg-row">
                        <img src="images/graphic.png" alt="graphic" class="img-fluid rounded align-self-start mr-lg-5 mb-5 mb-lg-0">
                        <div>
                            <h2>Realtime Messaging service</h2>
                            <p class="lead">Uniquely underwhelm premium outsourcing with proactive leadership skills. </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer rutrum, urna eu pellentesque pretium, nisi nisi fermentum enim, et sagittis dolor nulla vel sapien. Vestibulum sit amet mattis ante. Ut placerat dui eu nulla
                                congue tincidunt ac a nibh. Mauris accumsan pulvinar lorem placerat volutpat. Praesent quis facilisis elit. Sed condimentum neque quis ex porttitor,
                            </p>
                            <p> malesuada faucibus augue aliquet. Sed elit est, eleifend sed dapibus a, semper a eros. Vestibulum blandit vulputate pharetra. Phasellus lobortis leo a nisl euismod, eu faucibus justo sollicitudin. Mauris consectetur, tortor
                                sed tempor malesuada, sem nunc porta augue, in dictum arcu tortor id turpis. Proin aliquet vulputate aliquam.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	</div>
        </div>
</div>