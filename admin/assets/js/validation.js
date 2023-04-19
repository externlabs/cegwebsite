// Number validation
$(document).ready(function() {
    $(".number_validation").keydown(function (e) {
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
    (e.keyCode >= 35 && e.keyCode <= 40)) {
    return;
    }
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
    e.preventDefault();
    }
    });
    // Name validation
    $(document).on('keydown', '.name_validation', function(e) {
    if (e.which === 32 &&  e.target.selectionStart === 0) {return false;}  });
    });
    //Email Validation
    jQuery(document).ready(function(){
    function ValidateEmail(email) {
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    return expr.test(email);
    };
    jQuery(".email_validation").blur(function () {
    if (!ValidateEmail(jQuery(this).val())) {
    jQuery(this).val("");
    }
    else {
    return  true;
    }
    });
    });
    // DatePicker Value
    $(document).ready(function(){
        $('.date_picker').focus(function(){
            $(this).daterangepicker({                    
            singleDatePicker: true,
            showDropdowns: false,    
            locale: { 
                format: 'YYYY-MM-DD',
            }
            });      
        });   
    });
    // customer data
    $(document).on('click','.deleteCustomerBtn',function(){
        $('.deleteCustomerId').val($(this).attr('data-id'));
        $('#deleteCustomerModal').modal('show');
    });
    $(document).on('click','.addCustomerTagBtn',function(){
        $('.customerTagId').val($(this).attr('data-id'));
        $('#addCustomerTag').modal('show');
    });
    $(document).on('click','.changeCustomerStatusBtn',function(){
        $('.changeCustomerStatusId').val($(this).attr('data-id'));
        $('.chooseStatus').val($(this).attr('data-status'));
        $('#changeCustomerStatusModal').modal('show');
    });
    $(document).on('click','.sendCustomerEmailBtn',function(){
        $('.customerEmail').val($(this).attr('data-email'));
        $('#sendEmailModal').modal('show');
    });
    $(document).on('click','.masterCheck',function(){
        if($(this).prop('checked') == true)
        {
            $('.showdataOnCheck').show();
            $('.showdataOnCheckEmail').show();
            $('.childCheck').prop('checked',true);
            // set id data
            var setIdData = "";
            var setEmailData = "";
            $('.childCheck').each(function(){
                if(setIdData)
                {
                    setIdData = setIdData+","+$(this).attr('data-id');
                }
                else
                {
                    setIdData = $(this).attr('data-id');
                }
                // email data
                if(setEmailData)
                {
                    setEmailData = setEmailData+","+$(this).attr('data-email');
                }
                else
                {
                    setEmailData = $(this).attr('data-email');
                }
            });
            $('.showdataOnCheckEmail').attr('data-set',setEmailData);
            $('.showdataOnCheck').attr('data-set',setIdData);
        }
        else
        {
            $('.showdataOnCheck').hide();
            $('.showdataOnCheckEmail').hide();
            $('.childCheck').prop('checked',false);
            $('.showdataOnCheck').attr('data-set','');
            $('.showdataOnCheckEmail').attr('data-set','');
        }
    });
    $(document).on('click','.childCheck',function(){
        var setData = 0;
        var checkData = 0;
       $('.childCheck').each(function(){
           if($(this).prop('checked') == true)
           {
                checkData++;
           }
           else
           {
            setData++;
           }
       });
       if(setData == 0)
       {
           $('.masterCheck').prop('checked',true);
       } 
       else
       {
        $('.masterCheck').prop('checked',false);
       }
       if(checkData != 0)
       {
        var setIdData = "";
        var setEmailData = "";
        $('.childCheck').each(function(){
            if($(this).prop('checked') == true)
            {
                if(setIdData)
                {
                    setIdData = setIdData+","+$(this).attr('data-id');
                }
                else
                {
                    setIdData = $(this).attr('data-id');
                }
                // email data
                if(setEmailData)
                {
                    setEmailData = setEmailData+","+$(this).attr('data-email');
                }
                else
                {
                    setEmailData = $(this).attr('data-email');
                }
            }
        });
        $('.showdataOnCheck').attr('data-set',setIdData);
        $('.showdataOnCheckEmail').attr('data-set',setEmailData);
        $('.showdataOnCheck').show();
        $('.showdataOnCheckEmail').show();
       }
       else
       {
        $('.showdataOnCheck').attr('data-set','');
        $('.showdataOnCheckEmail').attr('data-set','');
        $('.showdataOnCheck').hide();
        $('.showdataOnCheckEmail').hide();
       }
    });
    $(document).on('click','.sendEmailMultipleCustomer',function(){
        $('.customerEmail').val($(this).attr('data-set'));
        $('#sendEmailModal').modal('show');
    });
    $(document).on('click','.addTagMultipleCustomer',function(){
        $('.customerTagId').val($(this).attr('data-set'));
        $('#addCustomerTag').modal('show');
    });
    $(document).on('click','.deleteMultipleCustomer',function(){
        $('.deleteCustomerId').val($(this).attr('data-set'));
        $('#deleteCustomerModal').modal('show');
    });
    $(document).on('click','.deleteCustomerGroupBtn',function(){
        $('.deleteGroupId').val($(this).attr('data-id'));
        $('#deleteCustomerGroupModal').modal('show');
    });
    $(document).on('click','.editCustomerGroupData',function(){
        $('.editGroupId').val($(this).attr('data-id'));
        $('.editCustomerGroupName').val($(this).attr('data-name'));
        $('.editCustomerGroupStatus').val($(this).attr('data-status'));
        $('#editCustomerGroupModal').modal('show'); 
    });
    $(document).on('click','.deleteMultipleroupCustomer',function(){
        $('.deleteCustomerGroupId').val($(this).attr('data-id'));
        $('#deleteCustomerFromGroup').modal('show');
    })
    $(document).on('click','.singleDeleteBtnData',function(){
        $('.deleteCustomerGroupId').val($(this).attr('data-id'));
        $('#deleteCustomerFromGroup').modal('show');
    })
    // setting module
    $(document).on("click",'.checkData',function(){
        if($(this).prop('checked') == true)
        {
            $(this).parents('.parentClass').find('.setTextData').attr('readonly',false);
        }
        else
        {
            $(this).parents('.parentClass').find('.setTextData').val('');
            $(this).parents('parentClass').find('.setTextData').attr('readonly',true);
        }
    })
    // add supplier module
    $(document).on('click','.selectProductData',function(){
        var getProductName = $(this).text();
        var getProductId = $(this).attr('data-id');
        var setData = 0;
        $('.getProiductIdData').each(function(){
            if($(this).val() == getProductId)
            {
                setData++;
            }
        });
        if(setData == 0)
        {
            $('.setProductIdData').append("<input type='hidden' value='"+getProductId+"' class='getProiductIdData' name='supplierProduct[]'/>");
            $('.setProductTag').append('<div class="tag setParentData label label-info alert alert-dismissable m-r-5 pointer"><span class="tag_text">'+getProductName+'</span><span data-id="'+getProductId+'" class="removeProduct" style="cursor:pointer;" type="button" class="" data-dismiss="alert" aria-hidden="true">×</span></div>');
            $('.searh-suggestionboxlistboxdata').hide();
            $('.searh-suggestionboxlistboxdata').html('');  
            $('.searh-suggestionboxinput').val(''); 
        }
        else
        {
            $('.searh-suggestionboxlistboxdata').hide();
            $('.searh-suggestionboxlistboxdata').html('');  
            $('.searh-suggestionboxinput').val(''); 
            alert('This product is already tag with supplier');
        }
    });
    $(document).on('click','.removeProduct',function(){
        var getProductId = $(this).attr('data-id');
        $('.getProiductIdData').each(function(){
            if($(this).val() == getProductId)
            {
                $(this).remove();
            }
        })
    });
    $(document).on('click','.deleteSupplierBtn',function(){
        $('.deleteSupplierId').val($(this).attr('data-id'));
        $('#deletSupplierModal').modal('show');
    });
    $(document).on('click','.updateSupplierStatus',function(){
        $('.changeStatusSupplierId').val($(this).attr('data-id'));
        $('.supplierStatus').val($(this).attr('data-status'));
        $('#statusModalData').modal('show');
    });
    $(document).on('click','.sendEmailSupplierBtn',function(){
        $('.supplierEmailData').val($(this).attr('data-email'));
        $('#sendEmailModal').modal('show');
    });
    $(document).on('click','.masterSupplierCheck',function(){
        var setIdData = "";
        if($(this).prop('checked') == true)
        {
            $('.childSupplierCheck').each(function(){
                if(setIdData)
                {
                    setIdData = setIdData+","+$(this).attr('data-id');
                }
                else
                {
                    setIdData = $(this).attr('data-id');
                }
            });
            $('.setSupplierMultiBtn').attr('data-id','');
            $('.setSupplierMultiBtn').attr('data-id',setIdData);
            $('.setSupplierMultiBtn').show();
            $('.childSupplierCheck').prop('checked',true);
        }
        else
        {
            $('.setSupplierMultiBtn').attr('data-id','');
            $('.setSupplierMultiBtn').hide();
            $('.childSupplierCheck').prop('checked',false);
        }
    });
    $(document).on('click','.childSupplierCheck',function(){
        var checkData = 0;
        var setData = 0;
        var setIdData = "";
        $('.childSupplierCheck').each(function(){
            if($(this).prop('checked') == false)
            {
                checkData++;
            }
            else if($(this).prop('checked') == true)
            {
                if(setIdData)
                {
                    setIdData = setIdData+","+$(this).attr('data-id');
                }
                else
                {
                    setIdData = $(this).attr('data-id');
                }
                setData++;
            }
        });
        $('.setSupplierMultiBtn').attr('data-id','');
        $('.setSupplierMultiBtn').attr('data-id',setIdData);
        if(checkData == 0)
        {
            $('.masterSupplierCheck').prop('checked',true);
        }
        else
        {
            $('.masterSupplierCheck').prop('checked',false);
        }
        if(setData == 0)
        {
            $('.setSupplierMultiBtn').hide();
        }
        else
        {
            $('.setSupplierMultiBtn').show();
        }
    });
    $(document).on('click','.chnageMultipleStatusData',function(){
        $('.changeStatusMultipleSupplierId').val($(this).attr('data-id'));
       $('#changeMultipleststatus').modal('show'); 
    });
    $(document).on('click','.deleteMultipleSupplier',function(){
        $('.deleteMultipleSupplierId').val($(this).attr('data-id'));
        $('#deletMultipleSupplierModal').modal('show'); 
    });
    // Coupons module
    $(document).on('click','.genearatePromoCodeCoupons',function(){
        if($(this).prop('checked') == true)
        {
            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var string_length = 6;
            var randomstring = '';
            for (var i=0; i<string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }
            $('.setPromocodeCoupons').val(randomstring);
        }
        else
        {
            $('.setPromocodeCoupons').val('');
        }
    });
    $(document).on('click','.deleteCopounBtn',function(){
        $('.deleteCouponId').val($(this).attr('data-id'));
        $('#deleteCouponsModal').modal('show');
    });
    // GIft Voucher
    $(document).on('click','.deleteMultipleVoucher',function(){
        $('.deleteVoucherId').val($(this).attr('data-id'));
        $('#deleteGiftVoucher').modal('show');
    });
    $(document).on('click','.deleteSingleGiftVoucher',function(){
        $('.deleteVoucherId').val($(this).attr('data-id'));
        $('#deleteGiftVoucher').modal('show');
    })
    $(document).on('click','.changeStatusMultippleVoucher',function(){
        $('.updateStatusId').val($(this).attr('data-id'));
        $('#updateGiftVouchermodal').modal('show');
    });
    // purchase order
    $(document).on('click','.masterSupplierProductCheck',function(){
        if($(this).prop('checked') == true)
        {
            $('.setProductQuantity').prop('readonly',false);
            $('.childSupplierProductCheck').prop('checked',true);
            // set data value
            $('.childSupplierProductCheck').each(function(){
                $(this).parents('.parentRowClass').find('.setSelectedProductId').val($(this).attr('data-id'));
                $(this).parents('.parentRowClass').find('.setProductQuantity').prop('readonly',false);
            });
        }
        else
        {
            $('.setProductQuantity').prop('readonly',true);
            $('.setProductQuantity').val('');
            $('.childSupplierProductCheck').prop('checked',false);
            // set data value
            $('.childSupplierProductCheck').each(function(){
                $(this).parents('.parentRowClass').find('.setSelectedProductId').val('');
                $(this).parents('.parentRowClass').find('.setProductQuantity').val('').prop('readonly',true);
            });
        }
    });
    $(document).on('click','.childSupplierProductCheck',function(){
        var checkData = 0;
        if($(this).prop('checked') == true)
        {
            $(this).parents('.parentRowClass').find('.setSelectedProductId').val($(this).attr('data-id'));
            $(this).parents('.parentRowClass').find('.setProductQuantity').prop('readonly',false);
        }
        else
        {
            $(this).parents('.parentRowClass').find('.setSelectedProductId').val('');
            $(this).parents('.parentRowClass').find('.setProductQuantity').val('').prop('readonly',true);
        }
        $('.childSupplierProductCheck').each(function(){
            if(!$(this).prop('checked') == true)
            {
                checkData++;
            }
        });
        if(checkData == 0)
        {
            $('.masterSupplierProductCheck').prop('checked',true);
        }
        else
        {
            $('.masterSupplierProductCheck').prop('checked',false);
        }
    });
    $(document).on('click','.deleteMultiplePurchase',function(){
        $('.deletesliderId').val($(this).attr('data-id'));
        $('#deletePurchaseModal').modal('show');
    });
    $(document).on('click','.deletePurcahseBtn',function(){
        $('.deletePurchaseId').val($(this).attr('data-id'));
        $('#deletePurchaseModal').modal('show');
    })