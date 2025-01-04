import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';

// 画像データの型を定義
interface CardGalleryProps {
  cards: string[];
}

const CardGallery: React.FC<CardGalleryProps> = ({ cards }) => {
  const [selectedCard, setSelectedCard] = useState<string | null>(null);
  const [isModalOpen, setModalOpen] = useState<boolean>(false);
  const [formData, setFormData] = useState({
    packId: '',
    name: '',
    reality: ''
  });

  const openModal = (card: string) => {
    setSelectedCard(card);
    setModalOpen(true);
  };

  const closeModal = () => {
    setSelectedCard(null);
    setModalOpen(false);
    setFormData({ packId: '', name: '', reality: '' }); // フォームをリセット
  };

  const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({ ...prevData, [name]: value }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // 登録処理を実装
    console.log('登録データ:', { ...formData, card: selectedCard });
    closeModal();
  };

  return (
    <div className="gallery">
      <div className="card-grid">
        {cards.map((card, index) => (
          <div key={index} className="card-item" onClick={() => openModal(card)}>
            <img src={card} alt={`card ${index}`} className="card" />
          </div>
        ))}
      </div>

      {isModalOpen && (
        <div className="modal">
          <div className="modal-content">
            <div className="modal-body">
              <div className="modal-card-container">
                <h2>画像編集</h2>
                <img src={selectedCard!} alt="Selected" className="modal-card" />
              </div>
              <div className="modal-form-container">
                <form onSubmit={handleSubmit}>
                  <div className="form-group">
                    <label>
                      Pack ID:
                      <input
                        type="text"
                        name="packId"
                        value={formData.packId}
                        onChange={handleInputChange}
                        className="form-control"
                      />
                    </label>
                  </div>
                  <div className="form-group">
                    <label>
                      Name:
                      <input
                        type="text"
                        name="name"
                        value={formData.name}
                        onChange={handleInputChange}
                        className="form-control"
                      />
                    </label>
                  </div>
                  <div className="form-group">
                    <label>
                      Reality:
                      <input
                        type="text"
                        name="reality"
                        value={formData.reality}
                        onChange={handleInputChange}
                        className="form-control"
                      />
                    </label>
                  </div>
                  <button type="submit" className="submit-button">登録</button>
                </form>
                <button onClick={closeModal} className="close-button">閉じる</button>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
};

// Laravel から渡された画像データを取得
const cards = (window as any).cards || [];

// Reactアプリケーションの描画
const root = ReactDOM.createRoot(document.getElementById('react-root') as HTMLElement);
root.render(<CardGallery cards={cards} />);
