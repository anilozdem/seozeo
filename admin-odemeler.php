<?PHP include 'header.php'; ?>


</br>
			<div class="col-lg-6">
				<div>
                     <div class="alert alert-success"><a class="alert-link">12 Yeni Odeme</a>
                     </div>
				</div>
			</div>
</br></br></br></br>
	<div class="ibox-content">
		<div class="row">
			
				<div class="col-sm-2 m-b-xs">
					<select class="input-sm input-s-sm inline" name="account">
                        <option>Blog Adi</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                    </select>
				</div>
			
			
			
				<label class="col-sm-2 m-s-sm inline">Tarih Araligi</label>
				<div class="col-sm-2 m-b-xs">
					<select class="input-sm input-s-sm inline" name="account">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                    </select>
				</div>
			
			
			
				<div class="col-sm-2 m-b-xs">
					<select class="input-sm input-s-sm inline" name="account">
                         <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                    </select>
				</div>
			
			
			
				
				<div class="col-sm-2 m-b-xs">
					<select class="input-sm input-s-sm inline" name="account">
                         <option>Durum</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                    </select>
				</div>
			
			
			<div class="col-sm-2 m-b-xs">
				<a href="admin-bloglar-hepsi.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary pull-left m-t-n-xs">Uygula</a>				
			</div>
		</div>	
	</div>		

	</br></br>
	<div class="row">
				<div class="col-lg-8">
				<div class="ibox">
					<div class="ibox content">
						<table class="table table-striped table-bordered table-hover dataTables-example" id="editable" >
						<thead>
						<tr>
							<th></th>
							<th>Blog Adı</th>							
							<th>Fiyat</th>
							<th>Durum</th>
						</tr>
						</thead>
						<tbody>
						<tr class="gradeX">
							<td><input type="checkbox" class="i-checks" name="input[]"></td>
							<td><a href="admin-blog-duzenleme.php">neclasolen.com</td>
							<td>50</td>
							<td></td>
						</tr>
						<tr class="gradeC">
							<td><input type="checkbox" class="i-checks" name="input[]"></td>
							<td>aorhan.com</td>
							<td>70</td>
							<td></td>
						</tr>
						
						<tr class="gradeA">
							<td><input type="checkbox" class="i-checks" name="input[]"></td>
							<td>aorhan.com</td>
							<td>70</td>
							<td></td>
						</tr>
						<tr class="gradeA">
							<td><input type="checkbox" class="i-checks" name="input[]"></td>
							<td>aorhan.com</td>
							<td>70</td>
							<td></td>
						</tr>
						<tr class="gradeA">
							<td><input type="checkbox" class="i-checks" name="input[]"></td>
							<td>aorhan.com</td>
							<td>70</td>
							<td></td>
						</tr>
						</tbody>           
						</table>
					</div>
				</div>
				</div>
	</div>
	
	
	
<?PHP include 'footer.php'; ?>