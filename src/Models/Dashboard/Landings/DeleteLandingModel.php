<?php
namespace Lando\App\Models\Dashboard\Landings;

class DeleteLandingModel {
	private $conn;
	private $uid;
	private $landingId;

	function __construct(
		$conn, int $uid, int $landingId
	){
	    $this->conn = $conn;
	    $this->uid = $uid;
	    $this->landingId = $landingId;
	}

	private function delete(
		string $tableName,
		string $landingIdCol,
		string $userIdCol
	){
		$stmt = $this->conn->prepare("
		    DELETE
		    FROM $tableName
		    WHERE $landingIdCol = ?
		    AND $userIdCol = ?
		");
		$stmt->bind_param("ii",
			$this->landingId,
			$this->uid
		);
		$stmt->execute();
		
		if ($stmt->affected_rows > 0) {
			return true;
		}
		return false;
	}

	public function deleteLanding() {
		return $this->delete(
			'landings',
			'id_landing',
			'userId_landing'
		);
	}

	public function deleteScreenshots() {
		return $this->delete(
			'screenshots',
			'landingId_screenshot',
			'userId_screenshot'
		);
	}

	public function deleteReviews() {
		return $this->delete(
			'reviews',
			'landingId_review',
			'userId_review'
		);
	}

	public function deleteFeatures() {
		return $this->delete(
			'features',
			'landingId_feature',
			'userId_feature'
		);
	}

	public function deleteHiw() {
		return $this->delete(
			'how_it_works',
			'landingId_hiw',
			'userId_hiw'
		);
	}

	public function deleteSteps() {
		return $this->delete(
			'steps',
			'landingId_step',
			'userId_step'
		);
	}

	public function deleteFaq() {
		return $this->delete(
			'faqs',
			'landingId_faq',
			'userId_faq'
		);
	}
}
