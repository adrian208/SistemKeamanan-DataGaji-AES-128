<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table = 'boking';
    protected $primaryKey = 'kdBoking';
    protected $useTimestamps = true;

    public function invoice_no()
    {
        $sql = "SELECT MAX (MID(noInvoice,9,4)) AS invoice_no
            FROM boking
            WHERE MID(noInvoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rowS > 0) {
            $row = $query->row;
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "IV-" . date('ymd') . $no;
        return $invoice;
    }
}
