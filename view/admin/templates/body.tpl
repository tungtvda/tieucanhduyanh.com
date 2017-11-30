
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript>
            Trình duyệt của bạn không hỗ trợ javascript<br />
            Để sử dụng được hết các chức năng của website, vui lòng bật javascript trên trình duyệt của bạn
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome {USER-NAME}</h2>
            <div id="ThongBao"><br />
            </div>			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3 style="cursor: s-resize;">{TABLE-NAME}</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="tab1 {TAB1-CLASS}">Table</a></li> 
						<li><a href="#tab2" class="tab2 {TAB2-CLASS}">Forms</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div>
				<div class="content-box-content">
					
					<div class="tab-content {TAB1-CLASS}" id="tab1" style="display: block;"> <!-- This is the target div. id must match the href of this div's tab -->
						
						{NOTIFICATION-CONTENT}
						 <form action="" method="GET">
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox"/></th>
								   {TABLE-HEADER}
                                    <th>Chức năng</th>
								</tr>
								
							</thead>
						 
							<tfoot>
								<tr>
									<td colspan="20">
										<div class="bulk-actions align-left">
                                       
											<select name="action_all">
												<option value="ThemMoi">Thêm mới </option>
												<option value="Xoa">Xóa</option>
												{ACTION}
											</select>
                                            <input class="button" type="submit" value="Apply"/>
										</div>
									
										<div class="pagination">
											{PAGING}
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>
								{TABLE-BODY}
							</tbody>
							
						</table>
							</form>
					</div> <!-- End #tab1 -->
					
					<div class="tab-content {TAB2-CLASS}" id="tab2" style="display: none;">
					
						<form action="" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							     {FORM}
								
								<p>
									<input class="button" type="submit" value="Submit"/>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				<script type="text/javascript">
                function openKcEditor(output)
                {
                    var L_AnhMinhHoa=document.getElementsByName(output);
                    var AnhMinhHoa=L_AnhMinhHoa[0];
                        window.KCFinder = {
                            callBack: function(url) {
                            window.KCFinder = null;
                            AnhMinhHoa.value=url;                          
                                }
                        };
                    window.open('{SITE-NAME}/view/admin/Themes/kcfinder/browse.php?type=images&dir=images/public',
                        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
                    );
                };

                </script>
			</div> <!-- End .content-box -->
			{CONTENT-BOX-LEFT}
			
			{CONTENT-BOX-RIGHT}
			
			<div class="clear"></div>
			<!-- Start Notifications -->
			{NOTIFICATION}
			