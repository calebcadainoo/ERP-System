
			<!-- create inner action button -->
			<div class="app_fab" title="Create New Receivables">Create New Invoice</div>
			<!-- end of create inner action button -->
			<br>
			<br>
			<section class="app_table_box"><aside class="app_table_scrollable">
				<table width="98%" border="1" id="table">
					<tr>
						<div class="th_main centertext increasefontsi">Billing History</div>
					</tr>
					
					<tr>
						<th>No.</th>
						<th>Client Name</th>
						<th>Work/Service Type</th>
						<th>Date</th>
						<th>View Details</th>
						<th>Print Out</th>
					</tr>

					<tr>
						<td class="centertext">1.</td>
						<td>Volta River Authority</td>
						<td class="centertext">Installations</td>
						<td class="centertext">3rd August, 2018</td>
						<td><button class="app_view_btn" title="View Details">View</button></td>
						<td><button class="app_view_btn" title="Print Invoice">Print</button></td>
					</tr>

					<?php
						for ($i=2; $i < 8; $i++) { 
							print('
								<tr>
									<td class="centertext">'.$i.'.</td>
									<td></td>
									<td></td>
									<td class="centertext"></td>
									<td class="centertext"></td>
									<td></td>
								</tr>
							');
						}
					?>
				</table>
			</aside></section>
			<div class="front_clrfx"></div>
			<div class="spacerA"></div>


