<?php
namespace Lando\App\Models\Dashboard\Landings;

class SaveLandingModel {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    public function saveLanding(
        string $hash,
        int $uid,
        string $title,
        string $logo,
        string $url,
        string $appStoreUrl,
        string $googlePlayUrl,
        string $description,
        string $subtitles,
        string $pageTitle,
        string $pageDescription,
        string $accentColor
    ): int {
        $internalDomain_landing = "";
        $externalDomain_landing = "";
        $status_landing = "active";

        $stmt = $this->conn->prepare("
            INSERT INTO landings
            (
                userId_landing,
                title_landing,
                logo_landing,
                url_landing,
                appStoreUrl_landing,
                googlePlayUrl_landing,
                description_landing,
                subtitles_landing,
                pageTitle_landing,
                pageDescription_landing,
                accentColor_landing,
                -- linkedin_landing
                -- facebook_landing
                -- twitter_landing
                -- instagram_landing
                -- discord_landing
                internalDomain_landing,
                externalDomain_landing,
                status_landing,
                hash_landing
            )
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ");
        $stmt->bind_param("issssssssssssss",
            $uid,
            $title,
            $logo,
            $url,
            $appStoreUrl,
            $googlePlayUrl,
            $description,
            $subtitles,
            $pageTitle,
            $pageDescription,
            $accentColor,
            $internalDomain_landing,
            $externalDomain_landing,
            $status_landing,
            $hash
        );
        $result = $stmt->execute();

        if (!$result) {
            error_log("Error saving landing: " . $this->conn->error);
            return 0;
        }
        return $this->conn->insert_id;
    }

    private function saveMultipleRecords(
        int $uid,
        int $landingId,
        array $records,
        string $sql,
        string $bindTypes
    ): bool {
        if (!empty($records)) {
            $this->conn->begin_transaction();
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                error_log("Error preparing statement: " . $this->conn->error);
                return false;
            }

            foreach ($records as $record) {
                $params = [$uid, $landingId];
                foreach ($record as $value) {
                    $params[] = $value;
                }

                $stmt->bind_param($bindTypes, ...$params);

                if (!$stmt->execute()) {
                    $this->conn->rollback();
                    error_log("Error saving record: " . $stmt->error);
                    return false;
                }
            }
            
            $this->conn->commit();
        }
        return true;
    }

    public function saveScreenshots(
        int $uid,
        int $landingId,
        ?array $screenshots = []
    ): bool {
        if (is_null($screenshots)) {
            $screenshots = [];
        }
        $sql = "
            INSERT INTO screenshots
            (
                userId_screenshot,
                landingId_screenshot,
                url_screenshot,
                order_screenshot
            )
            VALUES
            (?, ?, ?, 0)
        ";
        return $this->saveMultipleRecords(
            $uid, $landingId, $screenshots, $sql, "iis"
        );
    }

    public function saveReviews(
        int $uid,
        int $landingId,
        ?array $reviews = []
    ): bool {
        if (is_null($reviews)) {
            $reviews = [];
        }
        $sql = "
            INSERT INTO reviews
            (
                userId_review,
                landingId_review,
                img_review,
                name_review,
                rating_review,
                content_review
            )
            VALUES
            (?,?,?,?,?,?)
        ";
        return $this->saveMultipleRecords(
            $uid, $landingId, $reviews, $sql, "iissss"
        );
    }

    public function saveFeatures(
        int $uid,
        int $landingId,
        ?array $features = []
    ): bool {
        if (is_null($features)) {
            $features = [];
        }
        $sql = "
            INSERT INTO features
            (
                userId_feature,
                landingId_feature,
                title_feature,
                description_feature,
                icon_feature
            )
            VALUES
            (?,?,?,?,?)
        ";
        return $this->saveMultipleRecords(
            $uid, $landingId, $features, $sql, "iisss"
        );
    }

    public function saveHowItWorks(
        int $uid,
        int $landingId,
        ?array $howItWorks = []
    ): bool {
        if (is_null($howItWorks)) {
            $howItWorks = [];
        }
        $sql = "
            INSERT INTO how_it_works
            (
                userId_hiw,
                landingId_hiw,
                title_hiw,
                description_hiw,
                icon_hiw
            )
            VALUES
            (?,?,?,?,?)
        ";
        return $this->saveMultipleRecords(
            $uid, $landingId, $howItWorks, $sql, "iisss"
        );
    }

    public function saveSteps(
        int $uid,
        int $landingId,
        ?array $steps = []
    ): bool {
        if (is_null($steps)) {
            $steps = [];
        }
        $sql = "
            INSERT INTO steps
            (
                userId_step,
                landingId_step,
                title_step,
                description_step
            )
            VALUES
            (?,?,?,?)
        ";
        return $this->saveMultipleRecords(
            $uid, $landingId, $steps, $sql, "iiss"
        );
    }

    public function saveFaq(
        int $uid,
        int $landingId,
        ?array $faq = []
    ): bool {
        if (is_null($faq)) {
            $faq = [];
        }
        $sql = "
            INSERT INTO faqs
            (
                userId_faq,
                landingId_faq,
                question_faq,
                answer_faq
            )
            VALUES
            (?,?,?,?)
        ";
        return $this->saveMultipleRecords(
            $uid, $landingId, $faq, $sql, "iiss"
        );
    }
}
