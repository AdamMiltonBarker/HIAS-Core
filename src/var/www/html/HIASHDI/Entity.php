<?php session_start();

$pageDetails = [
	"PageID" => "HIASHDI",
	"SubPageID" => "HIASHDI",
	"LowPageID" => "Entity"
];

include dirname(__FILE__) . '/../../Classes/Core/init.php';
include dirname(__FILE__) . '/../iotJumpWay/Classes/iotJumpWay.php';
include dirname(__FILE__) . '/../HIASCDI/Classes/Interface.php';
include dirname(__FILE__) . '/../HIASHDI/Classes/Interface.php';

$hb = $HiasHdiInterface->get_hiashdi_entity("dateCreated,dateModified,*");
list($dev1On, $dev1Off) = $iotJumpWay->get_device_status($hb["networkStatus"]["value"]);
$stats = $iotJumpWay->get_stats();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="robots" content="noindex, nofollow" />

		<title><?=$HIAS->confs["meta_title"]; ?></title>
		<meta name="description" content="<?=$HIAS->confs["meta_description"]; ?>" />
		<meta name="keywords" content="" />
		<meta name="author" content="hencework"/>

		<script src="https://kit.fontawesome.com/58ed2b8151.js" crossorigin="anonymous"></script>

		<link type="image/x-icon" rel="icon" href="/img/favicon.png" />
		<link type="image/x-icon" rel="shortcut icon" href="/img/favicon.png" />
		<link type="image/x-icon" rel="apple-touch-icon" href="/img/favicon.png" />

		<link href="/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
		<link href="/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		<link href="/dist/css/style.css" rel="stylesheet" type="text/css">
		<link href="/AI/GeniSysAI/Media/CSS/GeniSys.css" rel="stylesheet" type="text/css">
	</head>

	<body id="GeniSysAI">

		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>

		<div class="wrapper theme-6-active pimary-color-pink">

			<?php include dirname(__FILE__) . '/../Includes/Nav.php'; ?>
			<?php include dirname(__FILE__) . '/../Includes/LeftNav.php'; ?>
			<?php include dirname(__FILE__) . '/../Includes/RightNav.php'; ?>

			<div class="page-wrapper">
				<div class="container-fluid pt-25">

					<?php include dirname(__FILE__) . '/../Includes/Stats.php'; ?>

					<div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-heading">
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<?php include dirname(__FILE__) . '/../Includes/Weather.php'; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<?php include dirname(__FILE__) . '/../iotJumpWay/Includes/iotJumpWay.php'; ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">HIASHDI Entity</h6>
									</div>
									<div class="pull-right"><a href="/HIASHDI/Configuration" download><i class="fas fa-download"></i> HIASHDI Configuration</a></div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">

										<div class="row">
											<div class="col-lg-12">

												<p>HIASHDI Entity type is a contextual representation of the HIAS Contextual Data Interface.</p>
												<p>&nbsp;</p>

												<p>Read the official <a href="https://docs.haiscdi.hias.network/" target="_BLANK">HIASHDI Documentation</a> for more information.</p>
												<p>&nbsp;</p>

											</div>
										</div>

										<div class="form-wrap">
											<form data-toggle="validator" role="form" id="update_hiashdi_form">
												<div class="row">
													<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label for="name" class="control-label mb-10">Name</label>
															<input type="text" class="form-control" id="name" name="name" placeholder="Name of Context Broker" required value="<?=$hb["name"]["value"]; ?>">
															<span class="help-block">Name of Context Broker</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Description</label>
															<input type="text" class="form-control" id="description" name="description" placeholder="Context Broker Description" required value="<?=$hb["description"]["value"]; ?>">
															<span class="help-block">Description of Context Broker</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Version</label>
															<input type="text" class="form-control" id="version" name="version" placeholder="Context Broker Version" required value="<?=$hb["version"]["value"]; ?>">
															<span class="help-block">Context Broker Version</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Host</label>
															<input type="text" class="form-control  hider" id="host" name="host" placeholder="Context Broker Host" required value="<?=$hb["host"]["value"]; ?>">
															<span class="help-block">Context Broker Host</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Port</label>
															<input type="text" class="form-control hider" id="port" name="port" placeholder="Context Broker Port" required value="<?=$hb["port"]["value"]; ?>">
															<span class="help-block">Context Broker Port</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Endpoint</label>
															<input type="text" class="form-control hider" id="endpoint" name="endpoint" placeholder="Context Broker Endpoint" required value="<?=$hb["endpoint"]["value"]; ?>">
															<span class="help-block">Context Broker Endpoint</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Device Brand Name</label>
															<input type="text" class="form-control" id="deviceBrandName" name="deviceBrandName" placeholder="Device Brand Name" required value="<?=$hb["deviceBrandName"]["value"]; ?>">
															<span class="help-block">Brand name of the device that the HIAS Server is installed on.</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Device Model</label>
															<input type="text" class="form-control" id="deviceModel" name="deviceModel" placeholder="Device Model" required value="<?=$hb["deviceModel"]["value"]; ?>">
															<span class="help-block">Model of the device that the HIAS Server is installed on.</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Device Manufacturer</label>
															<input type="text" class="form-control" id="deviceManufacturer" name="deviceManufacturer" placeholder="Device Manufacturer" required value="<?=$hb["deviceManufacturer"]["value"]; ?>">
															<span class="help-block">Manufacturer of the device that the HIAS Server is installed on.</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Device Serial Number</label>
															<input type="text" class="form-control" id="deviceSerialNumber" name="deviceSerialNumber" placeholder="Device Manufacturer" required value="<?=$hb["deviceSerialNumber"]["value"]; ?>">
															<span class="help-block">Serial number of the device that the HIAS Server is installed on.</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Operating System</label>
															<input type="text" class="form-control" id="os" name="os" placeholder="Operating system name" required value="<?=$hb["os"]["value"]; ?>">
															<span class="help-block">Operating system installed on the device that the HIAS Server is installed on.</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Operating System Version</label>
															<input type="text" class="form-control" id="osVersion" name="osVersion" placeholder="Operating System Version" required value="<?=$hb["osVersion"]["value"]; ?>">
															<span class="help-block">Installed operating system version.</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Operating System Manufacturer</label>
															<input type="text" class="form-control" id="osManufacturer" name="osManufacturer" placeholder="Operating System manufacturer" required value="<?=$hb["osManufacturer"]["value"]; ?>">
															<span class="help-block">Installed operating system Manufacturer</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Software</label>
															<input type="text" class="form-control" id="software" name="software" placeholder="Software" required value="<?=$hb["software"]["value"]; ?>">
															<span class="help-block">HIAS software</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Software Version</label>
															<input type="text" class="form-control" id="softwareVersion" name="softwareVersion" placeholder="Software Version" required value="<?=$hb["softwareVersion"]["value"]; ?>">
															<span class="help-block">HIAS software version</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Software Manufacturer</label>
															<input type="text" class="form-control" id="softwareManufacturer" name="softwareManufacturer" placeholder="Software Manufacturer" required value="<?=$hb["softwareManufacturer"]["value"]; ?>">
															<span class="help-block">HIAS software manufacturer</span>
														</div>
													</div>
													<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label class="control-label mb-10">Location</label>
															<select class="form-control" id="lid" name="lid" required>
																<option value="">PLEASE SELECT</option>

																<?php
																	$Locations = $iotJumpWay->get_locations();
																	if(!isSet($Locations["Error"])):
																		foreach($Locations as $key => $value):
																?>

																	<option value="<?=$value["id"]; ?>" <?=$value["id"] == $hb["networkLocation"]["value"] ? " selected " : ""; ?>><?=$value["name"]["value"]; ?></option>

																<?php
																		endforeach;
																	endif;
																?>

															</select>
															<span class="help-block">Location that HIASHDI is installed in</span>
														</div>
														<div class="form-group">
															<label class="control-label mb-10">Zone</label>
															<select class="form-control" id="zid" name="zid" required>
																<option value="">PLEASE SELECT</option>
																<?php
																	$Zones = $iotJumpWay->get_zones();
																	if(!isSet($Zones["Error"])):
																		foreach($Zones as $key => $value):
																?>

																<option value="<?=$value["id"]; ?>" <?=$hb["networkZone"]["value"] == $value["id"] ? " selected " : ""; ?>><?=$value["name"]["value"]; ?></option>

																<?php
																		endforeach;
																	endif;
																?>

															</select>
															<span class="help-block">Zone that HIASHDI is installed in</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Coordinates</label>
															<input type="text" class="form-control" id="coordinates" name="coordinates" placeholder="iotJumpWay Location coordinates" required value="<?=$hb["location"]["value"]["coordinates"][0]; ?>, <?=$hb["location"]["value"]["coordinates"][1]; ?>">
															<span class="help-block">iotJumpWay Device coordinates</span>
														</div>
														<div class="form-group">
															<label class="control-label mb-10">Protocols</label>
															<select class="form-control" id="protocols" name="protocols[]" required multiple>

																<?php
																	$protocols = $HiasInterface->get_protocols();
																	if(count($protocols)):
																		foreach($protocols as $key => $value):
																?>

																	<option value="<?=$value["protocol"]; ?>" <?=in_array($value["protocol"], $hb["protocols"]["value"]) ? " selected " : ""; ?>><?=$value["protocol"]; ?></option>

																<?php
																		endforeach;
																	endif;
																?>

															</select>
															<span class="help-block">Supported Communication Protocols</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">IP</label>
															<input type="text" class="form-control hider" id="ipAddress" name="ipAddress" placeholder="IP Address Of Context Broker" required value="<?=$hb["ipAddress"]["value"]; ?>">
															<span class="help-block">IP Address Of Context Broker</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">MAC</label>
															<input type="text" class="form-control hider" id="macAddress" name="macAddress" placeholder="MAC Address Of Context Broker" required value="<?=$hb["macAddress"]["value"] ? $hb["macAddress"]["value"] : ""; ?>">
															<span class="help-block">MAC Address Of Context Broker</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Bluetooth Address</label>
															<input type="text" class="form-control hider" id="bluetooth" name="bluetooth" placeholder="Device Bluetooth Address"  value="<?=$hb["bluetoothAddress"]["value"]; ?>">
															<span class="help-block">Bluetooth address of device</span>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Date Created</label>
															<p><?=$hb["dateCreated"]["value"]; ?></p>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Date First Used</label>
															<p><?=$hb["dateFirstUsed"]["value"] ? $hb["dateFirstUsed"]["value"] : "NA"; ?></p>
														</div>
														<div class="form-group">
															<label for="name" class="control-label mb-10">Date Modified</label>
															<p><?=$hb["dateModified"]["value"]; ?></p>
														</div>
													</div>
												</div>
												<div class="form-group mb-0">
													<input type="hidden" class="form-control" id="update_hiashdi" name="update_hiashdi" required value=True>
													<button type="submit" class="btn btn-success btn-anim" id="update_hiashdi_submit"><i class="icon-rocket"></i><span class="btn-text">Update</span></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div><br />
						</div>
						<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									<div class="pull-right"><span id="offline1" style="color: #33F9FF !important;" class="<?=$dev1On; ?>"><i class="fas fa-power-off" style="color: #33F9FF !important;"></i> Online</span> <span id="online1" class="<?=$dev1Off; ?>" style="color: #99A3A4 !important;"><i class="fas fa-power-off" style="color: #99A3A4 !important;"></i> Offline</span></div>
										<div class="form-group">
											<label class="control-label col-md-5">Status</label>
											<div class="col-md-12">
												<i class="fas fa-battery-full data-right-rep-icon txt-light" aria-hidden="true"></i>&nbsp;<span id="batteryUsage"><?=$hb["batteryLevel"]["value"]; ?></span>% &nbsp;&nbsp;
												<i class="fa fa-microchip data-right-rep-icon txt-light" aria-hidden="true"></i>&nbsp;<span id="cpuUsage"><?=$hb["cpuUsage"]["value"]; ?></span>% &nbsp;&nbsp;
												<i class="zmdi zmdi-memory data-right-rep-icon txt-light" aria-hidden="true"></i>&nbsp;<span id="memoryUsage"><?=$hb["memoryUsage"]["value"]; ?></span>% &nbsp;&nbsp;
												<i class="far fa-hdd data-right-rep-icon txt-light" aria-hidden="true"></i>&nbsp;<span id="hddUsage"><?=$hb["hddUsage"]["value"]; ?></span>% &nbsp;&nbsp;
												<i class="fa fa-thermometer-quarter data-right-rep-icon txt-light" aria-hidden="true"></i>&nbsp;<span id="temperatureUsage"><?=$hb["temperature"]["value"]; ?></span>°C
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									<div class="pull-right"></div>
										<div class="form-group">
											<label class="control-label col-md-5">Location</label>
											<div class="col-md-12">
												<div id="map1" class="map" style="height: 300px;"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">HIASHDI Schema</h6>
									</div>
									<div class="pull-right"></div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div  style="height: 400px; overflow-y: scroll; overflow-x: hidden;">
											<?php echo "<pre id='schema'>"; ?> <?php print_r(json_encode($hb, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?> <?php echo "</pre>"; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="pull-right"><a href="javascipt:void(0)" id="reset_hiashdi_key"><i class="fa fa-refresh"></i> Reset Network Key</a></div>
										<div class="form-group">
											<label class="control-label col-md-5">Network Identifier</label>
											<div class="col-md-9">
												<p class="form-control-static hiderstr" id="network_identifier"><?=$hb["id"]; ?></p>
												<p><strong>Last Updated:</strong> <?=$hb["authenticationKey"]["metadata"]["timestamp"]["value"]; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="pull-right"></div>
										<div class="form-group">
											<label class="control-label col-md-5">Blockchain Address</label>
											<div class="col-md-9">
												<p class="form-control-static hiderstr" id="hiascdi_blockchain_address"><?=$hb["authenticationBlockchainUser"]["value"]; ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-5">Blockchain Key</label>
											<div class="col-md-9">
												<p class="form-control-static hiderstr" id="hiascdi_blockchain_key"><?=$HIAS->helpers->oDecrypt($hb["authenticationBlockchainKey"]["value"]); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="pull-right"><a href="javascipt:void(0)" id="reset_hiascdi_mqtt"><i class="fa fa-refresh"></i> Reset MQTT Password</a></div>
										<div class="form-group">
											<label class="control-label col-md-5">MQTT Username</label>
											<div class="col-md-9">
												<p class="form-control-static hiderstr" id="hiashdi_mqqt_username"><?=$HIAS->helpers->oDecrypt($hb["authenticationMqttUser"]["value"]); ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-5">MQTT Password</label>
											<div class="col-md-9">
												<p class="form-control-static"><span id="hiashdi_mqqt_password" class="hiderstr"><?=$HIAS->helpers->oDecrypt($hb["authenticationMqttKey"]["value"]); ?></span>
												<p><strong>Last Updated:</strong> <?=$hb["authenticationMqttKey"]["metadata"]["timestamp"]["value"]; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default card-view panel-refresh">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="pull-right"><a href="javascipt:void(0)" id="reset_dvc_amqp"><i class="fa fa-refresh"></i> Reset AMQP Password</a></div>
										<div class="form-group">
											<label class="control-label col-md-5">AMQP Username</label>
											<div class="col-md-9">
												<p class="form-control-static hiderstr" id="damqpu"><?=$HIAS->helpers->oDecrypt($hb["authenticationAmqpUser"]["value"]); ?></p>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-5">AMQP Password</label>
											<div class="col-md-9">
												<p class="form-control-static hiderstr"><span id="damqpp"><?=$HIAS->helpers->oDecrypt($hb["authenticationAmqpKey"]["value"]); ?></span>
												<p><strong>Last Updated:</strong> <?=$hb["authenticationAmqpKey"]["metadata"]["timestamp"]["value"]; ?></p>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			<?php include dirname(__FILE__) . '/../Includes/Footer.php'; ?>

		</div>

		<?php  include dirname(__FILE__) . '/../Includes/JS.php'; ?>

		<script type="text/javascript" src="/iotJumpWay/Classes/mqttws31.js"></script>
		<script type="text/javascript" src="/iotJumpWay/Classes/iotJumpWay.js"></script>
		<script type="text/javascript" src="/iotJumpWay/Classes/iotJumpWayUI.js"></script>
		<script type="text/javascript" src="/HIASHDI/Classes/HIASHDI.js?time=<?=time(); ?>"></script>
		<script type="text/javascript">

			$(document).ready(function() {
				HIASHDI.HideSecret();
				HIASHDI.Monitor();
			});

			function initMap() {

				var latlng = new google.maps.LatLng("<?=floatval($hb["location"]["value"]["coordinates"][0]); ?>", "<?=floatval($hb["location"]["value"]["coordinates"][1]); ?>");
				var map = new google.maps.Map(document.getElementById('map1'), {
					zoom: 10,
					center: latlng
				});

				var loc = new google.maps.LatLng(<?=floatval($hb["location"]["value"]["coordinates"][0]); ?>, <?=floatval($hb["location"]["value"]["coordinates"][1]); ?>);
				var marker = new google.maps.Marker({
					position: loc,
					map: map,
					title: 'Device '
				});
			}

		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?=$HIAS->helpers->oDecrypt($HIAS->confs["gmaps"]); ?>&callback=initMap"></script>

	</body>
</html>