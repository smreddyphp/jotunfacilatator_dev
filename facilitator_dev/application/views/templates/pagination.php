<?php if(!empty($strPagination)): ?>
    <div class="well<?php echo (isset($nIsAjax) && $nIsAjax) ? ' ajax-paginate' : ''; ?>">
        <ul class="pagination">
            <?php echo $strPagination; ?>
        </ul>
    </div>
<?php endif; ?>