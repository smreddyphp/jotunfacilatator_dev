  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" name="product_name" value="<?php $value['product_name']?>" required>
        </div>
        <div class="modal-footer">
          <button type="button" id="product" class="btn btn-default" onclick="save_data(2);">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <script>
  function save_data($id)
  {
      alert("hello");
      $.ajax({                
    url: "<?php echo base_url();?>home/set_rating",
    type: "POST",
    data: data,
    mimeType: "multipart/form-data",
    contentType: false,
    cache: false,
    processData:false,
    error:function(request,response)
    {
        console.log(request);
    },                  
    success: function(result)
    {
       location.reload(); 
    }
  });
  }
  
  </script>