[   {"name":"hid", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"haddress", "table":"home", "data_type":"text"},
    {"name":"htype", "table":"home", "data_type":"enum('Live','Trial')"},
    {"name":"hdashtype", "table":"home", "data_type":"enum('live','developers','training')"},
    {"name":"photo_count", "table":"home", "data_type":"int(5)"},
    {"name":"edit_cost", "table":"home", "data_type":"float"},
    {"name":"usd_cost", "table":"home", "data_type":"float"},
    {"name":"upload_cancelled", "table":"home", "data_type":"int(11)"},
    {"name":"sent_upload_error", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"hpriority", "table":"home", "data_type":"enum('Low','Med','High')"},
    {"name":"htimeline", "table":"home", "data_type":"enum('rush','rush2','rush3','rush4','rush5','24','36','48')"},
    {"name":"free_rush", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"hstatus", "table":"home", "data_type":"enum('Deleted','Client Fill-up','Client Uploading','New','Awaiting Edit','Downloading','Editing','Uploading','Partial Upload','Pending','Needs Approval','Ready','Revision','Partial Upload Revision','Uploading Revision','Accepted')"},
    {"name":"hrating", "table":"home", "data_type":"int(11)"},
    {"name":"hrating_new", "table":"home", "data_type":"int(11)"},
    {"name":"hrating_old", "table":"home", "data_type":"int(11)"},
    {"name":"hnote", "table":"home", "data_type":"text"},
    {"name":"hfeedback_note", "table":"home", "data_type":"text"},
    {"name":"hfeedback_note_new", "table":"home", "data_type":"text"},
    {"name":"hfeedback_note_old", "table":"home", "data_type":"text"},
    {"name":"buc_keep_raw", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"buc_keep_exp1", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"buc_keep_other_exp", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"done_cleaning", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"zip_location", "table":"home", "data_type":"enum('Server','S3','Deleted')"},
    {"name":"backup_root_folder", "table":"home", "data_type":"varchar(20)"},
    {"name":"backup_size", "table":"home", "data_type":"bigint(20)"},
    {"name":"s3_backup_size", "table":"home", "data_type":"bigint(20)"},
    {"name":"prev_hstatus", "table":"home", "data_type":"varchar(50)"},
    {"name":"deleted_by", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"hcreated", "table":"home", "data_type":"datetime"},
    {"name":"hsubmit_click", "table":"home", "data_type":"datetime"},
    {"name":"upload_expire", "table":"home", "data_type":"datetime"},
    {"name":"hsubmitted", "table":"home", "data_type":"datetime"},
    {"name":"hdeadline", "table":"home", "data_type":"datetime"},
    {"name":"hdelivery_hour", "table":"home", "data_type":"varchar(30)"},
    {"name":"client_approved_date", "table":"home", "data_type":"datetime"},
    {"name":"hdownloaded_date", "table":"home", "data_type":"datetime"},
    {"name":"huploader_id", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"huploaded_date", "table":"home", "data_type":"datetime"},
    {"name":"ready_date", "table":"home", "data_type":"datetime"},
    {"name":"oid", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"ucid", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"owid", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"first_home", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"htid", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"attachment_note", "table":"home", "data_type":"text"},
    {"name":"home_path", "table":"home", "data_type":"varchar(50)"},
    {"name":"tf_status", "table":"home", "data_type":"enum('processing','success','failed')"},
    {"name":"tf_tour_id", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"tf_custom_w", "table":"home", "data_type":"varchar(20)"},
    {"name":"tf_custom_h", "table":"home", "data_type":"varchar(20)"},
    {"name":"tf_process_id", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"tf_percentage", "table":"home", "data_type":"smallint(6)"},
    {"name":"tf_process_started", "table":"home", "data_type":"datetime"},
    {"name":"tf_notify_email", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"use_scenename", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"tf_wid", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"tf_watermark_position", "table":"home", "data_type":"enum('Bottom Left','Bottom Right','Top Left','Top Right')"},
    {"name":"done_creating_zip", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"sdash_tid", "table":"home", "data_type":"bigint(20) unsigned"},
    {"name":"flush_photo_cost", "table":"home", "data_type":"enum('Yes','No','cost_error','cost_has_discount')"},
    {"name":"photo_data_updated", "table":"home", "data_type":"int(11)"},
    {"name":"update_photo_count", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"custom_hpriority", "table":"home", "data_type":"enum('Low','Med','High')"},
    {"name":"custom_hdeadline", "table":"home", "data_type":"datetime"},
    {"name":"sharing", "table":"home", "data_type":"enum('Yes','No')"},
    {"name":"pid", "table":"photo", "data_type":"bigint(20) unsigned"},
    {"name":"pname", "table":"photo", "data_type":"text"},
    {"name":"p_fsr", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"p_isr", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"p_le", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"p_mor1", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"p_lc", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"p_dtd", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"p_mor2", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"p_grouping", "table":"photo", "data_type":"enum('Hdr','Masking','Blending','Panoramic')"},
    {"name":"p_notes", "table":"photo", "data_type":"text"},
    {"name":"cname", "table":"photo", "data_type":"tinytext"},
    {"name":"pwidth", "table":"photo", "data_type":"varchar(10)"},
    {"name":"pheight", "table":"photo", "data_type":"varchar(10)"},
    {"name":"original_pwidth", "table":"photo", "data_type":"varchar(10)"},
    {"name":"original_pheight", "table":"photo", "data_type":"varchar(10)"},
    {"name":"pstatus", "table":"photo", "data_type":"enum('Uploading','Uploaded','Revision')"},
    {"name":"fname", "table":"photo", "data_type":"text"},
    {"name":"is_favorite", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"favorite_note", "table":"photo", "data_type":"text"},
    {"name":"feedback_note", "table":"photo", "data_type":"text"},
    {"name":"is_final_backup", "table":"photo", "data_type":"enum('Yes','No')"},
    {"name":"hid", "table":"photo", "data_type":"bigint(20) unsigned"},
    {"name":"sort_rank", "table":"photo", "data_type":"int(11)"},
    {"name":"scene_name", "table":"photo", "data_type":"text"},
    {"name":"puploader_id", "table":"photo", "data_type":"bigint(20) unsigned"},
    {"name":"puploader_tid", "table":"photo", "data_type":"bigint(20) unsigned"},
    {"name":"puploaded_date", "table":"photo", "data_type":"datetime"},
    {"name":"photo_edit_cost", "table":"photo", "data_type":"float"},
    {"name":"approved_by", "table":"photo", "data_type":"bigint(20) unsigned"},
    {"name":"owid", "table":"photo", "data_type":"bigint(20) unsigned"},
    {"name":"upload_width", "table":"photo", "data_type":"varchar(10)"},
    {"name":"upload_height", "table":"photo", "data_type":"varchar(10)"}]
