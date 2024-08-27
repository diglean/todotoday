<?php

namespace App\Domain\Task\Enums;

enum TaskStatus: string
{
    case Canceled = 'canceled';

    case Doing = 'doing';

    case Done = 'done';

    case Pending = 'pending';

    case Overdue = 'overdue';

    public function translate(): string
    {
        return match ($this) {
          $this::Canceled => 'Cancelada',
          $this::Doing => 'Fazendo',
          $this::Done => 'Feito',
          $this::Pending => 'Pendente',
          $this::Overdue => 'Vencida',
        };
    }
}