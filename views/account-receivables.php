
			<!-- create inner action button -->
			<div class="app_fab" title="Create New Receivables">Create New Receivables</div>
			<!-- end of create inner action button -->
			<br>
			<br>
			<section class="app_table_box"><aside class="app_table_scrollable">
				<div class="th_main centertext increasefontsi">Account Receivable Records</div>
				<table width="98%" border="1" id="table">
					<tr>
						<th>No.</th>
						<th>Account Name</th>
						<th>Amount</th>
						<th>Date</th>
						<th>Payment Details</th>
					</tr>

					<tr>
						<td class="centertext">1.</td>
						<td>Volta River Authority</td>
						<td>$50,000.00</td>
						<td class="centertext">3rd August, 2018</td>
						<td class="centertext">For Contract Works</td>
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
								</tr>
							');
						}
					?>
				</table>
			</aside></section>
			<div class="front_clrfx"></div>
			<div class="spacerA"></div>


