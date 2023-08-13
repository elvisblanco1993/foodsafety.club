<?php

namespace App\Jobs;

use App\Models\Alert;
use App\Models\Recall;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class PullFDADataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = Http::get('https://api.fda.gov/food/enforcement.json', [
            'search' => 'report_date:[20230101 TO 20231231]',
            'limit' => 100,
        ]);

        $data = $response->json();

        foreach ($data['results'] as $item) {
            try {
                Recall::updateOrCreate(
                    [
                        'event_id' => $item['event_id'],
                    ],
                    [
                        "status" => $item["status"],
                        "city" => $item["city"],
                        "state" => $item["state"],
                        "country" => $item["country"],
                        "classification" => $item["classification"],
                        "openfda" => json_encode($item["openfda"]),
                        "product_type" => $item["product_type"],
                        "recalling_firm" => $item["recalling_firm"],
                        "address_1" => $item["address_1"],
                        "address_2" => $item["address_2"],
                        "postal_code" => $item["postal_code"],
                        "voluntary_mandated" => $item["voluntary_mandated"],
                        "initial_firm_notification" => $item["initial_firm_notification"],
                        "distribution_pattern" => $item["distribution_pattern"],
                        "recall_number" => $item["recall_number"],
                        "product_description" => $item["product_description"],
                        "product_quantity" => $item["product_quantity"],
                        "reason_for_recall" => $item["reason_for_recall"],
                        "recall_initiation_date" => $item["recall_initiation_date"],
                        "center_classification_date" => $item["center_classification_date"],
                        "report_date" => $item["report_date"],
                        "code_info" => $item["code_info"],
                    ]
                );
            } catch (\Throwable $th) {
                Log::error($th);
            }
        }
    }
}
