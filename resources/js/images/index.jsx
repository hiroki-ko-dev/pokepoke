import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';

// Reactコンポーネント
const ImageGallery = ({ images }) => {
    const [selectedImage, setSelectedImage] = useState(null);
    const [isModalOpen, setModalOpen] = useState(false);

    const openModal = (image) => {
        setSelectedImage(image);
        setModalOpen(true);
    };

    const closeModal = () => {
        setSelectedImage(null);
        setModalOpen(false);
    };

    return (
        <div className="gallery">
            {/* 画像一覧 */}
            <div className="image-grid">
                {images.map((image, index) => (
                    <div key={index} className="image-item" onClick={() => openModal(image)}>
                        <img src={image} alt={`Image ${index}`} className="image" />
                    </div>
                ))}
            </div>

            {/* 編集モーダル */}
            {isModalOpen && (
                <div className="modal">
                    <div className="modal-content">
                        <h2>画像編集</h2>
                        <img src={selectedImage} alt="Selected" className="modal-image" />
                        <button onClick={closeModal} className="close-button">閉じる</button>
                        {/* ここに編集フォームを追加 */}
                    </div>
                </div>
            )}
        </div>
    );
};

// サーバーから画像データを取得
const images = [
    '/images/cards/A1-011-226.png',
    // 他の画像URLを追加
];

// Reactアプリケーションの描画
const root = ReactDOM.createRoot(document.getElementById('react-root'));
root.render(<ImageGallery images={images} />);
