import React, { useState } from 'react';
import styles from './CardGallery.module.scss'; // CSSモジュールのインポート
import CreateForm from '../CreateForm/CreateForm';

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
    reality: '',
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
    closeModal();
  };

  return (
    <div className={styles.gallery}>
      <div className={styles.cardGrid}>
        {cards.map((card, index) => (
          <div
            key={index}
            className={styles.cardItem}
            onClick={() => openModal(card)}
          >
            <img src={card} alt={`card ${index}`} className={styles.card} />
          </div>
        ))}
      </div>
      {isModalOpen && 
      <CreateForm
        cardUrl={selectedCard ?? ''}
      />
      }
    </div>
  );
};

export default CardGallery;
